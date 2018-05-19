<?php

namespace App\Aaulyp\Tools\Api;

use App\Aaulyp\Constants\ApiConstants;
use App\Aaulyp\Hydrators\EventHydrator;
use App\Aaulyp\Models\EventModel;

class EventbriteApi extends ApiBaseHelper
{
    const EVENTBRITE_YP_ID = 1877578689;
    const EB_MEMBERSHIP_EVENT_ID = 42592772128;

    /**
     * Gets contents of a single order
     *
     * @param string $url
     *
     * @return array
     */
    public function getOrderPlaced($url)
    {
        $content = $this->getContentFromRequest('GET', $url, $this->getBaseOptions());

        $orderInfo = json_decode($content, true);

        return $orderInfo;
    }

    /**
     * @param string $eventId
     *
     * @return array
     */
    public function getTicketsInfo($eventId)
    {
        $tickets = [];
        $ticketResponse = $this->getTicketClassInfo($eventId);
        $decoded = json_decode($ticketResponse);
        $ticketClasses = $decoded->ticket_classes;
        $tickets['total_sold'] = $this->getSoldTicketCount($ticketClasses);
        $tickets['total_revenue'] = $this->getTicketGrossAmount($ticketClasses);
        $tickets['ticket_types'] = $ticketClasses;
        $tickets['event_id'] = $eventId;

        $ticketsArray = json_decode(json_encode($tickets), true);

        return $ticketsArray;
    }

    /**
     * @return array
     */
    public function getYpEvents()
    {
        $events = $this->getOrganizerEventsById(self::EVENTBRITE_YP_ID);

        $eventsArray = json_decode($events, true);

        $completedEvents = [];

        foreach ($eventsArray['events'] as $event) {
            $transformedEvent = $this->transformEvent($event);
            $completedEvents[] = $transformedEvent;
        }

        return $completedEvents;
    }

    /**
     * Add relational details to eventbrite data
     *
     * @param array $event
     *
     * @return array
     */
    protected function addRelationalDetails($event)
    {
        if (isset($event['venue_id'])) {
            $venueJson = $this->getVenueById($event['venue_id']);
            $event['venue_details'] = json_decode($venueJson, true);
        }

        if (isset($event['logo_id'])) {
            $mediaJson = $this->getMediaById($event['logo_id']);
            $event['image_details'] = json_decode($mediaJson, true);
        }

        $ticketsInfo = $this->getTicketsInfo($event["id"]);
        $event["tickets"] = $ticketsInfo;

        return $event;
    }

    /**
     * @param $event
     *
     * @return EventModel
     */
    protected function transformEvent($event)
    {
        $updatedEvent = $this->addRelationalDetails($event);

        $hydrator = new EventHydrator();
        $Event = $hydrator->hydrateByType($updatedEvent, ApiConstants::EVENTBRITE);

        return $Event;
    }

    public function getMediaResults($mediaId)
    {
        $url = ApiConstants::EVENTBRITE_BASE_URL."media/{$mediaId}";

        $options = $this->getBaseOptions();

        $content = $this->getContentFromRequest('GET', $url, $options);

        return $content;
    }

    /**
     * @param $eventId
     *
     * @return object
     */
    public function getGetEventById($eventId)
    {
        $url = ApiConstants::EVENTBRITE_BASE_URL."events/{$eventId}";

        $options = $this->getBaseOptions();

        $content = $this->getContentFromRequest('GET', $url, $options);

        return json_decode($content, true);
    }

    /**
     * @param string $venueId
     *
     * @return object
     */
    public function getVenueById($venueId)
    {
        $url = ApiConstants::EVENTBRITE_BASE_URL."venues/{$venueId}";

        $options = $this->getBaseOptions();

        $content = $this->getContentFromRequest('GET', $url, $options);

        return $content;
    }

    /**
     * @param string $mediaId
     *
     * @return object
     */
    public function getMediaById($mediaId)
    {
        $url = ApiConstants::EVENTBRITE_BASE_URL."media/{$mediaId}";

        $options = $this->getBaseOptions();

        $content = $this->getContentFromRequest('GET', $url, $options);

        return $content;
    }

    protected function getEventOrders($id)
    {
        $url = ApiConstants::EVENTBRITE_BASE_URL . "events/{$id}/orders";

        $content = $this->getContentFromRequest('GET', $url, $this->getBaseOptions());

        $orders = json_decode($content);

        return $orders;
    }

    protected function getTicketClassInfo($id)
    {
        $url = ApiConstants::EVENTBRITE_BASE_URL . "events/{$id}/ticket_classes";

        $ticketClasses = $this->getContentFromRequest('GET', $url, $this->getBaseOptions());

        return $ticketClasses;
    }

    protected function getOrganizerEventsById($id)
    {
        $url = ApiConstants::EVENTBRITE_BASE_URL . "/organizers/".$id."/events/";

        $events = $this->getContentFromRequest('GET', $url, $this->getBaseOptions());

        return $events;
    }

    /**
     * @return array
     */
    protected function getBaseOptions()
    {
        $headers = [
            'Authorization' => 'Bearer ' . env('EVENTBRITE_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        $options = [
            'headers' => $headers
        ];

        return $options;
    }

    /**
     * @param object $ticketClasses
     *
     * @return int
     */
    protected function getSoldTicketCount($ticketClasses)
    {
        $total = 0;
        $decodedClasses = json_decode(json_encode($ticketClasses),true);

        foreach ($decodedClasses as $ticketClass) {
            $total += $ticketClass['quantity_sold'];
        }

        return $total;
    }

    /**
     * @param object $ticketClasses
     *
     * @return int
     */
    protected function getTicketGrossAmount($ticketClasses)
    {
        $total = 0;
        $decodedClasses = json_decode(json_encode($ticketClasses),true);

        foreach ($decodedClasses as $ticketClass) {
            if ($ticketClass['donation'] || !isset($ticketClass['actual_cost'])) {
                continue;
            }

            $total += ($ticketClass['actual_cost']['value'] * $ticketClass['quantity_sold'] * 0.01);
        }

        return $total;
    }
}