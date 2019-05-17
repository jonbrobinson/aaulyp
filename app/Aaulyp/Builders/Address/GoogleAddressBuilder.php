<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 4/14/18
 * Time: 8:39 AM
 */

namespace App\Aaulyp\Builders\Address;

/**
 * Class GoogleAddressBuilder
 *
 * @package App\Aaulyp\Builders\Address
 */
class GoogleAddressBuilder extends AddressBuilder
{
    public function __construct(array $addrData)
    {
        parent::__construct($addrData);

        $preparedData = $this->prepareData();

        $this->setAddrData($preparedData);
    }

    public function getAddressLineOne()
    {
        $data = $this->getAddrData();

        $address_line_1 = $data["street_number"] . " " . $data["street"];

        return $address_line_1;
    }

    public function getAddressLineTwo()
    {
        // TODO: Implement getAddressLineTwo() method.
    }

    public function getAddressCity()
    {
        $data = $this->getAddrData();

        $city = $data["city"];

        return $city;
    }

    public function getAddressState()
    {
        $data = $this->getAddrData();

        $state = $data["state"];

        return $state;
    }

    public function getAddressZip()
    {
        $data = $this->getAddrData();

        $zip = $data["zip"];

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

        $formattedAddress = $data["formatted_address"];

        return $formattedAddress;
    }

    public function getAddressName()
    {
        $data = $this->getAddrData();
    }

    protected function prepareData()
    {
        $data = $this->getAddrData();
        $address = array();
        $components = $data['address_components'];

        foreach ($components as $component) {
            if ('street_number' == $component['types'][0]) {
                $address[$component['types'][0]] = $component['long_name'];
            }

            if ('route' == $component['types'][0]) {
                $address['street'] = $component['short_name'];
            }

            if ('locality' == $component['types'][0]) {
                $address['city'] = $component['long_name'];
            }

            if ('locality' == $component['types'][0]) {
                $address['city'] = $component['long_name'];
            }

            if ('administrative_area_level_1' == $component['types'][0]) {
                $address['state'] = $component['short_name'];
            }

            if ('postal_code' == $component['types'][0]) {
                $address['zip'] = $component['long_name'];
            }
        }

        $address['formatted_address'] = $data['formatted_address'];
        $address['latitude'] = $data['geometry']['location']['lat'];
        $address['longitude'] = $data['geometry']['location']['lng'];

        return $address;
    }
}