<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';

    /**
     * Fillable fields for an Event
     *
     * @var array
     */
    protected $fillable = [
        "title",
        "description",
        "email",
        "rank",
        "type",
        "active",
    ];

    public function officers()
    {
        return $this->belongsToMany('App\Officer')->withPivot('position_id', 'officer_id')->withTimestamps();
    }

}
