<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 3/18/17
 * Time: 7:26 PM
 */

namespace App\Aaulyp\Services;

use App\Aaulyp\Tools\Api\FacebookSdkHelper;

use App\Aaulyp\Tools\Api\EventbriteApi;

class EventsBuilder
{
    protected $facebookSdk;
    protected $eventbriteApi;

    public function __construct(FacebookSdkHelper $facebookSdk, EventbriteApi $eventbrite)
    {
        $this->facebookSdk = $facebookSdk;
        $this->eventBriteApi = $eventbrite;
    }
}