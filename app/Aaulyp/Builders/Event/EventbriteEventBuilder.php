<?php

namespace App\Aaulyp\Builders\Event;

use app\Aaulyp\Constants\ApiConstants;
use App\Aaulyp\Hydrators\AddressHydrator;

class EventbriteEventBuilder extends EventBuilder
{
    public function getEventId()
    {
        $data = $this->getEventData();
        $id = $data["id"];

        return $id;
    }

    public function getEventTitle()
    {
        $data = $this->getEventData();
        $title = "";
        if (isset($data["name"])) {
            $title = $data["name"]["text"];
        }

        return $title;
    }

    public function getEventDescription()
    {
        $data = $this->getEventData();
        $description = new \stdClass();
        if (isset($data["description"])) {
            $description->text = $data["description"]["text"];
            $description->html = $data["description"]["html"];
        }

        return $description;
    }

    public function getEventTimeStart()
    {
        $data = $this->getEventData();
        $time_start = "";

        if (array_key_exists('start', $data) && array_key_exists('local', $data['start'])) {
            $time_start = strtotime($data['start']['local']);
        }

        return $time_start;
    }

    public function getEventTimeEnd()
    {
        $data = $this->getEventData();
        $time_start = "";

        if (array_key_exists('start', $data) && array_key_exists('local', $data['start'])) {
            $time_start = strtotime($data['start']['local']);
        }

        return $time_start;
    }

    public function getEventVenue()
    {
        $data = $this->getEventData();
        $address = "";

        if (isset($data['venue_details'])) {
            $venueData = $data['venue_details'];
        }

        if(!empty($venueData)){
            $addressHydrator = new AddressHydrator();
            $address = $addressHydrator->hydrateByType($venueData, ApiConstants::EVENTBRITE);
        }

        return $address;
    }

    public function getEventCoverImage()
    {
        $data = $this->getEventData();

        $url = "";

        if (isset($data['image_details'])) {
            $url = $data['image_details']['original']['url'];
        }

        return $url;
    }

    public function getEventTicketUrl()
    {
        $data = $this->getEventData();

        return $data['url'];
    }

    public function getEventPlatformUrl()
    {
        $data = $this->getEventData();

        return $data['url'];
    }

    public function getEventPlatform()
    {
        return ApiConstants::EVENTBRITE;
    }

    public function getEventMeta()
    {
        $data = $this->getEventData();

        $meta = new \stdClass();

        if (isset($data['tickets'])){
            $meta->tickets = $data['tickets'];
        }

        return $meta;
    }
}