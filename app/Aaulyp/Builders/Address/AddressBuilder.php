<?php

namespace App\Aaulyp\Builders\Address;

use App\Aaulyp\Interfaces\AddressBuilderInterface;
use App\Aaulyp\Models\AddressModel;

abstract class AddressBuilder implements AddressBuilderInterface
{
    /**
     * @var array
     */
    private $addrData;

    abstract public function getAddressLineOne();
    abstract public function getAddressLineTwo();
    abstract public function getAddressCity();
    abstract public function getAddressState();
    abstract public function getAddressZip();
    abstract public function getAddressLongitude();
    abstract public function getAddressLatitude();
    abstract public function getAddressFormattedAddress();

    /**
     * AddressBuilder constructor.
     *
     * @param array $addrData
     */
    public function __construct($addrData)
    {
        $this->validateAddressData($addrData);
        $this->setAddrData($addrData);
    }

    public function getAddressModel()
    {
        return new AddressModel();
    }

    protected function getAddrData()
    {
        return $this->addrData;
    }

    protected function setAddrData($data)
    {
        $this->addrData = $data;
    }

    private function validateAddressData($data)
    {
        if (!is_array($data)) {
            throw new \Exception("Address Data Format Error: Please submit data as an array");
        }
    }
}