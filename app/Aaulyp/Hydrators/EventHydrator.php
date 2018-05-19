<?php

namespace App\Aaulyp\Hydrators;

use App\Aaulyp\Builders\Event\DefaultEventBuilder;
use App\Aaulyp\Builders\Event\FacebookEventBuilder;
use App\Aaulyp\Builders\Event\EventbriteEventBuilder;
use App\Aaulyp\Builders\EventManager;
use app\Aaulyp\Constants\ApiConstants;

class EventHydrator
{
    protected $eventManager;

    public function __construct()
    {
        $this->eventManager = new EventManager();
    }

    public function hydrateByType($data, $type)
    {

        switch($type) {
            case ApiConstants::EVENTBRITE:
                $Builder = new EventbriteEventBuilder($data);
                break;
            case ApiConstants::FACEBOOK:
                $Builder = new FacebookEventBuilder($data);
                break;
            default:
                $Builder = new DefaultEventBuilder($data);
        }


        return $this->eventManager->buildEvent($Builder);
    }
}