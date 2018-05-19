<?php

namespace App\Aaulyp\Builders;

use App\Aaulyp\Interfaces\AddressBuilderInterface;

/**
 * AddressManager
 */
class AddressManager
{
    /**
     * @param AddressBuilderInterface $builder
     * @return object
     */
    public function buildAddress(AddressBuilderInterface $builder)
    {
        $Address = $builder->getAddressModel();
        $Address->address_line_1 = $builder->getAddressLineOne();
        $Address->address_line_2 = $builder->getAddressLineTwo();
        $Address->city = $builder->getAddressCity();
        $Address->state = $builder->getAddressState();
        $Address->zip = $builder->getAddressZip();
        $Address->latitiude = $builder->getAddressLatitude();
        $Address->longitude = $builder->getAddressLongitude();
        $Address->formatted_address = $builder->getAddressFormattedAddress();

        return $Address;
    }
}