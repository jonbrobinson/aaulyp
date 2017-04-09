<?php

namespace App\Aaulyp\Tools\Api;

use App\Aaulyp\Services\EventFormatter;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Request;
use Psy\Exception\Exception;
use App\Aaulyp\Tools\Api\GoogleMapsApi;

class EventbriteApi extends EventFormatter
{
    const EVENTBRITE_BASE_URL = "https://www.eventbriteapi.com/v3/";
    const EVENTBRITE_YP_ID = 1877578689;

    protected $guzzle;
    protected $googleMapsApi;

    public function __construct(GoogleMapsApi $googleMapsApi)
    {
        $this->guzzle = new Guzzle();
        $this->googleMapsApi = $googleMapsApi;
    }

    /**
     * Gets contents of a single folder
     *
     * @param string $url
     *
     * @return array
     */
    public function getOrderPlaced($url)
    {
        $content = $this->getContentFromRequest('GET', $url, $this->getBaseOptions());

        $orderJson = json_decode($content);

        $orderInfo = $this->getOrderInfoFromJson($orderJson);

        return $orderInfo;
    }

    /**
     * @param string $eventId
     *
     * @return array
     */
    public function getTicketsInfo($eventId)
    {
        $ticketClasses = $this->getTicketClassInfo($eventId);

        $ticketsInfo = $this->convertTicketsInfo($ticketClasses);

        return $ticketsInfo;
    }

    /**
     * @return mixed|object
     */
    public function getYpEvents()
    {
        $url = self::EVENTBRITE_BASE_URL . "/organizers/".self::EVENTBRITE_YP_ID."/events/";

        $events = $this->getContentFromRequest('GET', $url, $this->getBaseOptions());

        $events = json_decode($events, true);

        $completedEvents = array();

        foreach ($events['events'] as $event) {
            $eventDetails = $this->addRelationalDetails($event);
            $relations = $this->getEventbriteRelations();
            $completeEvent = $this->convertEventToStandard('eventbrite', $relations, $eventDetails);
            $completedEvents[] = $completeEvent;
        }

        return $completedEvents;
    }

    /**
     * @param int $timestamp
     *
     * @return mixed
     */
    public function buildStorageFile($timestamp)
    {
        $path = storage_path()."/cache/eventbrite/tmp/events_{$timestamp}.json";

        $file = $this->createFile($path);

        return $file;
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
        if (array_key_exists('start', $event) && array_key_exists('local', $event['start'])) {
            $event['start_epoch'] = strtotime($event['start']['local']);
        }

        if (array_key_exists('end', $event) && array_key_exists('local', $event['end'])) {
            $event['end_epoch'] = strtotime($event['end']['local']);
        }

        if (isset($event['venue_id'])) {
            $event['venue_details'] = json_decode($this->getVenueById($event['venue_id']), true);
        }

        if (isset($event['logo_id'])) {
            $event['image_details'] = json_decode($this->getMediaById($event['logo_id']), true);
        }

        $venue = $this->getSimpleVenueDetails();

        if (array_key_exists('venue_details', $event)) {
            $venue = $this->transformVenueAddress($event['venue_details']);
        }

        $event['venue_address'] = $venue;


        if (array_key_exists('image_details', $event)) {
            $event['cover_image'] = $event['image_details']['original']['url'];
        }

        return $event;
    }

    /**
     * Validates Venue information and returns a simple address and name for venue
     *
     * @param $venueDetails
     *
     * @return array
     */
    protected function transformVenueAddress($venueDetails)
    {
        $ebKeys = array('address_1', 'address_2', 'city', 'postal_code', 'region');
        $details = $this->getSimpleVenueDetails();
        $missingEbKeys = array();

        foreach ($ebKeys as $ebKey) {
            if (!array_key_exists($ebKey, $venueDetails['address']) ) {
                $missingEbKeys[] = $ebKey;
                continue;
            }

            if (!isset($venueDetails['address'][$ebKey])) {
                $missingEbKeys[] = $ebKey;
                continue;
            }
        }

        if (in_array('address_2', $missingEbKeys) && (count($missingEbKeys) > 1)) {
            if (!empty(floatval($venueDetails['latitude'])) && !empty(floatval($venueDetails['longitude']))) {
                $address = $this->googleMapsApi->getAddressFromLatLong($venueDetails['latitude'], $venueDetails['longitude']);
                $details['address'] = $address['street_number']." ".$address['street'];
                $details['city'] = $address['city'];
                $details['state'] = $address['state'];
                $details['zip'] = $address['zip'];
                $details['display'] = $address['formatted_address'];

                return $details;
            }
        }

        if (count($missingEbKeys) > 2) {
            return $details;
        }

        $details['address'] = $venueDetails['address']['address_1'];
        $details['city'] = $venueDetails['address']['city'];
        $details['postal_code'] = $venueDetails['address']['postal_code'];
        $details['state'] = $venueDetails['address']['region'];

        if (isset($venueDetails['address']['address_2'])) {
            $details['address'] .= " ".$venueDetails['address']['address_2'];
        }


        $details['display'] = $details['address'].", ".$details['city'].", ".$details['state'].$details['display'];

        return $details;
    }

    public function getMediaResults($mediaId)
    {
        $url = self::EVENTBRITE_BASE_URL."media/{$mediaId}";

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
        $url = self::EVENTBRITE_BASE_URL."events/{$eventId}";

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
        $url = self::EVENTBRITE_BASE_URL."venues/{$venueId}";

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
        $url = self::EVENTBRITE_BASE_URL."media/{$mediaId}";

        $options = $this->getBaseOptions();

        $content = $this->getContentFromRequest('GET', $url, $options);

        return $content;
    }

    protected function getEventOrders($id)
    {
        $url = self::EVENTBRITE_BASE_URL . "events/{$id}/orders";

        $content = $this->getContentFromRequest('GET', $url, $this->getBaseOptions());

        $orders = json_decode($content);

        return $orders;
    }

    protected function getTicketClassInfo($id)
    {
        $url = self::EVENTBRITE_BASE_URL . "events/{$id}/ticket_classes";

        $ticketClasses = $this->getContentFromRequest('GET', $url, $this->getBaseOptions());

        return $ticketClasses;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array  $options
     *
     * @return object
     */
    protected function getContentFromRequest($method, $url, $options = array())
    {
        try {
            $response = $this->guzzle->request($method, $url, $options);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $content = $response->getBody()->getContents();

        return $content;
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
     *
     */
    protected function getOrderInfoFromJson($json)
    {
        $orderInfo = [
            'firstName' => $json->first_name,
            'lastName'  => $json->last_name,
            'email'     => $json->email,
            'event_id'  => $json->event_id
        ];

        return $orderInfo;
    }

    /**
     * @return array
     */
    protected function convertTicketsInfo($tickets)
    {
        $json = json_decode($tickets);

        $ticketsInfo= array();
        $ticketsInfo['total'] = 0;

        foreach ($json->ticket_classes as $key => $ticketClass) {
            $ticketInfo = array();
            $ticketInfo['name']  = $ticketClass->name;
            $ticketInfo['sold']  = $ticketClass->quantity_sold;
            $ticketsInfo['event_id'] = $ticketClass->event_id;
            $ticketsInfo['total'] += $ticketInfo['sold'];
            $ticketsInfo['ticketTypes'][] = $ticketInfo;
        }

        return $ticketsInfo;
    }

    /**
     * @return array
     */
    protected function getEventbriteRelations()
    {
        $relations = [
            'id' => 'id',
            'title' => 'name',
            'description' => 'description',
            'time_start' => 'start_epoch',
            'time_end' => 'end_epoch',
            'venue' => 'venue_address',
            'cover_image' => 'cover_image',
            'ticket_url' => 'url',
            'platform_url' => 'url'
        ];

        return $relations;
    }
}