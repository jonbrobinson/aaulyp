<?php

namespace App\Aaulyp\Builders\Address;

use App\Aaulyp\Interfaces\AddressBuilderInterface;

/**
 * Class EventbriteAddressBuilder
 *
 * @package App\Aaulyp\Builders\Address
 */
class DefaultAddressBuilder extends AddressBuilder
{

    public function getAddressLineOne()
    {
        $data = $this->getAddrData();

        $address_line_1 = "";

        return $address_line_1;
    }

    public function getAddressLineTwo()
    {
        $data = $this->getAddrData();

        $address_line_2 = "";

        return $address_line_2;
    }

    public function getAddressCity()
    {
        $data = $this->getAddrData();

        $city = "";

        return $city;
    }

    public function getAddressState()
    {
        $data = $this->getAddrData();

        $state = "";

        return $state;
    }

    public function getAddressZip()
    {
        $data = $this->getAddrData();

        $zip = "";

        return $zip;
    }

    public function getAddressLongitude()
    {

        $data = $this->getAddrData();

        $longitude = "";

        return $longitude;
    }

    public function getAddressLatitude()
    {
        $data = $this->getAddrData();

        $latitude = "";

        return $latitude;
    }

    public function getAddressFormattedAddress()
    {
        $formattedAddress = "";

        return $formattedAddress;
    }
}