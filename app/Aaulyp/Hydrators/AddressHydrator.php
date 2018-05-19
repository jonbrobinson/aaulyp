<?php

namespace App\Aaulyp\Hydrators;

use App\Aaulyp\Builders\Address\DefaultAddressBuilder;
use App\Aaulyp\Builders\Address\EventbriteAddressBuilder;
use App\Aaulyp\Builders\Address\GoogleAddressBuilder;
use App\Aaulyp\Builders\AddressManager;
use app\Aaulyp\Constants\ApiConstants;

class AddressHydrator
{
    protected $addressManager;

    public function __construct()
    {
        $this->addressManager = new AddressManager;
    }

    /**
     * @param array $data raw data returned from
     * @param string $type
     *
     * @return object
     */
    public function hydrateByType($data, $type)
    {

        switch($type) {
            case ApiConstants::EVENTBRITE:
                $Builder = new EventbriteAddressBuilder($data);
                break;
            case ApiConstants::GOOGLE:
                $Builder = new GoogleAddressBuilder($data);
                break;
            default:
                $Builder = new DefaultAddressBuilder($data);
        }

        return $this->addressManager->buildAddress($Builder);
    }
}