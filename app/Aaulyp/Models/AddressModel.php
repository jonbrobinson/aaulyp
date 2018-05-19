<?php

namespace App\Aaulyp\Models;

/**
 * Class AddressModel
 *
 * @package App\Aaulyp\Models
 */
class AddressModel
{
    /**
     * @var string
     */
    public $address_line_1;

    /**
     * @var string
     */
    public $address_line_2;

    /**
     * @var object
     */
    public $address_meta;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $city;

    /**
     * @var int
     */
    public $zip;

    /**
     * @var float
     */
    public $longitude;

    /**
     * @var float
     */
    public $latitiude;

    /**
     * @var string
     */
    public $formatted_address;

    /**
     * @var string
     */
    public $name;

    /**
     * @var object
     */
    public $meta;
}