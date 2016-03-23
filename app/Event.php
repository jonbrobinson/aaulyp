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
}
