<?php

namespace App\Aaulyp\Models;


class EventModel
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var object
     */
    public $description;

    /**
     * @var int
     */
    public $time_start;

    /**
     * @var string
     */
    public $time_end;

    /**
     * @var AddressModel
     */
    public $venue;

    /**
     * @var float
     */
    public $cover_image;

    /**
     * @var float
     */
    public $ticket_url;

    /**
     * @var string
     */
    public $platform_url;

    /**
     * @var string
     */
    public $platform;

    /**
     * @var object
     */
    public $meta;
}