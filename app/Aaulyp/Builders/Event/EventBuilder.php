<?php

namespace App\Aaulyp\Builders\Event;

use App\Aaulyp\Interfaces\EventBuilderInterface;
use App\Aaulyp\Models\EventModel;

abstract class EventBuilder implements EventBuilderInterface
{
    abstract public function getEventId();
    abstract public function getEventTitle();
    abstract public function getEventDescription();
    abstract public function getEventTimeStart();
    abstract public function getEventTimeEnd();
    abstract public function getEventVenue();
    abstract public function getEventCoverImage();
    abstract public function getEventTicketUrl();
    abstract public function getEventPlatformUrl();
    abstract public function getEventPlatform();
    abstract public function getEventMeta();

    /**
     * @var array
     */
    private $eventData;

    /**
     * AddressBuilder constructor.
     *
     * @param array $eventData
     */
    public function __construct($eventData)
    {
        $this->validateEventData($eventData);
        $this->setEventData($eventData);
    }

    public function getEventModel()
    {
        return new EventModel();
    }

    protected function getEventData()
    {
        return $this->eventData;
    }

    protected function setEventData($data)
    {
        $this->eventData = $data;
    }

    private function validateEventData($data)
    {
        if (!is_array($data)) {
            throw new \Exception("Event Data Format Error: Please submit data as an array");
        }
    }
}