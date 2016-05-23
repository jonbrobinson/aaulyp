<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    /**
     * An Event is composed of many photos
     *
     * @return object
     */
    public function event()
    {
        return $this->belongsToMany('App\Event');
    }

    /**
     * An Event is composed of many photos
     *
     * @return object
     */
    public function photo()
    {
        return $this->belongsToMany('App\Photo');
    }

    /**
     * An Event is composed of many photos
     *
     * @return object
     */
    public function post()
    {
        return $this->belongsToMany('App\Post');
    }
}
