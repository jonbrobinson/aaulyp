<?php

namespace App\Aaulyp\Builders;

use App\Aaulyp\Interfaces\EventBuilderInterface;

/**
 * EventManager
 */
class EventManager
{
    /**
     * @param EventBuilderInterface $builder
     *
     * @return object
     */
    public function buildEvent(EventBuilderInterface $builder)
    {
        $Event = $builder->getEventModel();
        $Event->id = $builder->getEventId();
        $Event->title = $builder->getEventTitle();
        $Event->description = $builder->getEventDescription();
        $Event->time_start = $builder->getEventTimeStart();
        $Event->time_end = $builder->getEventTimeEnd();
        $Event->venue = $builder->getEventVenue();
        $Event->cover_image = $builder->getEventCoverImage();
        $Event->ticket_url = $builder->getEventTicketUrl();
        $Event->platform_url = $builder->getEventPlatformUrl();
        $Event->platform = $builder->getEventPlatform();
        $Event->meta = $builder->getEventMeta();


        return $Event;
    }
}