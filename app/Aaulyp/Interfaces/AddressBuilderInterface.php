<?php

namespace App\Aaulyp\Interfaces;

interface AddressBuilderInterface
{
    public function getAddressModel();
    public function getAddressLineOne();
    public function getAddressLineTwo();
    public function getAddressCity();
    public function getAddressState();
    public function getAddressZip();
    public function getAddressLongitude();
    public function getAddressLatitude();
    public function getAddressFormattedAddress();
}