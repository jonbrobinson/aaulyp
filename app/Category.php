<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

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
