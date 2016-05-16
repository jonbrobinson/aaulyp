<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    /**
     * Fillable fields for an Event
     *
     * @var array
     */
    protected $fillable = [
        "user_id",
        "name",
        "slug",
        "description",
        "description_plain",
        "street",
        "city",
        "state",
        "zip",
        "date_start",
        "date_end"
    ];

    /**
     * An Event is composed of many photos
     *
     * @return object
     */
    public function photos()
    {
        return $this->hasMany('App\Event_Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Find event based on $zip and $name
     *
     * @param string $zip
     * @param string $name
     *
     * @return mixed
     */
    public static function locatedAt( $zip, $name)
    {
        $name = str_replace('-', ' ', $name);

        return static::where(compact('zip','name'))->firstOrFail();
    }

    /**
     * @param Event_Photo $photo
     */
    public function addPhoto(Event_Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    /**
     * Scope queary to those located at a given address
     *
     * @param Builder $query
     * @param string $uri
     *
     * @return mixed
     */
    public function scopeFindEventByUri($query, $uri)
    {
        $sections = explode('/',$uri);

        $event = $query->where([
            ['zip', $sections[0]],
            ['name', str_replace('-',' ', $sections[1])]
        ])->first();

        return $event;
    }

    /**
     * An event is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Determine if the given user is the owner of an event
     *
     * @return bool
     */
    public function ownedBy(User $user)
    {
        return $this->user_id == $user->id;
    }
}
