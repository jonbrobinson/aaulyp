<?php

namespace App\Aaulyp\Interfaces;

interface EventBuilderInterface
{
    public function getEventModel();
    public function getEventId();
    public function getEventTitle();
    public function getEventDescription();
    public function getEventTimeStart();
    public function getEventTimeEnd();
    public function getEventVenue();
    public function getEventCoverImage();
    public function getEventTicketUrl();
    public function getEventPlatformUrl();
    public function getEventPlatform();
    public function getEventMeta();
}