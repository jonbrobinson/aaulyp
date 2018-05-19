<?php

namespace App\Aaulyp\Builders\Address;

/**
 * Class EventbriteAddressBuilder
 *
 * @package App\Aaulyp\Builders\Address
 */
class EventbriteAddressBuilder extends AddressBuilder
{

    public function getAddressLineOne()
    {
        $data = $this->getAddrData();

        $address_line_1 = $data["address"]['address_1'];

        return $address_line_1;
    }

    public function getAddressLineTwo()
    {
        $data = $this->getAddrData();

        $address_line_2 = "";
        if (isset($data["address"]['address_2'])) {
            $address_line_2 = $data["address"]['address_2'];
        }

        return $address_line_2;
    }

    public function getAddressCity()
    {
        $data = $this->getAddrData();

        $city = $data["address"]['city'];

        return $city;
    }

    public function getAddressState()
    {
        $data = $this->getAddrData();

        $state = $data["address"]['region'];

        return $state;
    }

    public function getAddressZip()
    {
        $data = $this->getAddrData();

        $zip = $data["address"]['postal_code'];

        return $zip;
    }

    public function getAddressLongitude()
    {
        $data = $this->getAddrData();

        $longitude = $data["longitude"];

        return $longitude;
    }

    public function getAddressLatitude()
    {
        $data = $this->getAddrData();

        $latitude = $data["latitude"];

        return $latitude;
    }

    public function getAddressFormattedAddress()
    {
        $data = $this->getAddrData();

        $formattedAddress = "";

        if (isset($data["address"]["localized_address_display"])) {
            $formattedAddress = $data["address"]["localized_address_display"];
        }

        if (empty($formattedAddress)) {
            $formattedAddress = $this->getDefaultFormattedAddress($data);
        }

        return $formattedAddress;
    }

    protected function getDefaultFormattedAddress($data)
    {
        $formattedAddress = "";

        if (isset($data["address"]["address_1"])){
            $formattedAddress .= "{$data["address"]["address_1"]} ";
        }

        if (isset($data["address"]["address_2"])){
            $formattedAddress .= "{$data["address"]["address_2"]}" ;
        }

        if (!empty(trim($formattedAddress))) {
            $formattedAddress .= ", ";
        }

        if (isset($data["address"]['city'])) {
            $formattedAddress .= "{$data["address"]["city"]}";
        }

        if (!empty(trim($formattedAddress))) {
            $formattedAddress .= ", ";
        }

        if (isset($data["address"]['region'])) {
            $formattedAddress .= "{$data["address"]["region"]} ";
        }

        if (isset($data["address"]['postal_code'])) {
            $formattedAddress .= "{$data["address"]["postal_code"]} ";
        }

        return $formattedAddress;
    }
}