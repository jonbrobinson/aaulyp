<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Photo extends Model
{
    protected $table = 'event_photos';

    protected $fallible = ['photo_path', 'event_main'];

    /**
     * An Event is composed of many photos
     *
     * @return object
     */
    public function events()
    {
        return $this->belongsTo('App\Event');
    }
}
