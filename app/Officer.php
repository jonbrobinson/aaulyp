<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $table = 'officers';

    /**
     * Fillable fields for an Event
     *
     * @var array
     */
    protected $fillable = [
        "first_name",
        "last_name",
        "bio",
        "positionId",
        "linkedin",
        "facebook",
        "twitter",
        "img_headshot",
        "img_alternative",
        "uc_meta",
    ];

    public function positions()
    {
        return $this->belongsToMany('App\Position')->withPivot('officer_id', 'position_id')->withTimestamps();
    }
}
