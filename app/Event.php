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
        "name",
        "description",
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

    /**
     * Scope queary to those located at a given address
     *
     * @param Builder $query
     * @param string $zip
     * @param string $title
     *
     * @return mixed
     */
    public function scopeLocatedAt($query, $zip, $name)
    {
        $name = str_replace('-', ' ', $name);

        return $query->where(compact('zip','name'))->first();
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
}
