<?php

namespace App\Aaulyp\Tools\Api;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Request;
use Psy\Exception\Exception;
use App\Aaulyp\Tools\Api\GoogleMapsApi;

class EventbriteApi
{
    const EVENTBRITE_BASE_URL = "https://www.eventbriteapi.com/v3/";
    const EVENTBRITE_YP_ID = 1877578689;
    const YP_WEEKEND_ID = 25893386817;
    const JOIN_WEEK_ID = 31314155482;
    const MEMBERSHIP_2017 = 31015190269;
    const FINANCIAL_MEETUP = 31440952736;

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

    public function getYpEvents()
    {
        $url = self::EVENTBRITE_BASE_URL . "/organizers/".self::EVENTBRITE_YP_ID."/events/";

        $events = $this->getContentFromRequest('GET', $url, $this->getBaseOptions());

        $events = json_decode($events, true);

        $completedEvents = array();

        foreach ($events['events'] as $event) {
            $eventDetails = $this->addRelationalDetails($event);
//            dd($eventDetails);
            $completedEvents[] = $this->transformEventDetails($eventDetails);
//            dd($completedEvents);
        }

        dd($completedEvents);

        return $events;

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
            $event['end_epoch'] = strtotime($event['start']['local']);
        }

        if (isset($event['venue_id'])) {
            $event['venue_details'] = json_decode($this->getVenueById($event['venue_id']), true);
        }

        if (isset($event['logo_id'])) {
            $event['image_details'] = json_decode($this->getMediaById($event['logo_id']), true);
        }

        return $event;
    }

    /**
     * @return array
     */
    protected function getSimpleVenueDetails()
    {
        $details = array(
            "address" => "",
            "city" => "",
            "postal_code" => "",
            "state" => "",
            'longitude' => "",
            'latitude' => "",
            'display' => "",
            'name' => "",
        );

        return $details;
    }

    /**
     * Validates Venue information and returns a simple address and name for venue
     *
     * @param $venueDetails
     *
     * @return array
     */
    protected function getSimpleVenueAddress($venueDetails)
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
                $details['display'] = $address;

                return $address;
            }

            return $details;
        }

        $details['address'] = $venueDetails['address']['address_1'];
        $details['city'] = $venueDetails['address']['city'];
        $details['postal_code'] = $venueDetails['address']['postal_code'];
        $details['state'] = $venueDetails['address']['region'];

        if (isset($venueDetails['address']['address_2'])) {
            $details['address'] .= " ".$venueDetails['address']['address_2'];
        }

        if (isset($venueDetails['name'])) {
            $details['name'] = $venueDetails['name'];
        }

        $details['display'] = $details['address'].", ".$details['city'].", ".$details['state'].$details['display'];

        return $details;
    }

    /**
     * @param array $event eventbrite venue details
     *
     * @return array
     */
    protected function transformEventDetails($event)
    {
        if (!array_key_exists('venue_details', $event) || empty($event['venue_details'])) {
            $event['venue_address'] =  $this->getSimpleVenueDetails();

            return $event;
        }

        $event['venue_address'] = $this->getSimpleVenueAddress($event['venue_details']);

        return $event;
    }


    public function getYpWeekendOrders()
    {
        $orders = $this->getEventOrders(self::YP_WEEKEND_ID);

        return $orders;
    }

    public function getYpWeekendTicketInfo()
    {
        $ticketsInfo = $this->getTicketsInfo(self::YP_WEEKEND_ID);

        return $ticketsInfo;
    }

    /**
     * @return array
     */
    public function getJoinWeekTicketsInfo()
    {
        $ticketsInfo = $this->getTicketsInfo(self::JOIN_WEEK_ID);

        return $ticketsInfo;
    }

    /**
     * @return array
     */
    public function getMembership2017TicketsInfo()
    {
        $ticketsInfo = $this->getTicketsInfo(self::MEMBERSHIP_2017);

        return $ticketsInfo;
    }

    /**
     * @return array
     */
    public function getFinancialMeetupTicketsInfo()
    {
        $ticketsInfo = $this->getTicketsInfo(self::FINANCIAL_MEETUP);

        return $ticketsInfo;
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


    /**
     * @param string $eventId
     *
     * @return array
     */
    protected function getTicketsInfo($eventId)
    {
        $ticketClasses = $this->getTicketClassInfo($eventId);

        $ticketsInfo = $this->convertTicketsInfo($ticketClasses);

        return $ticketsInfo;
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
            'email'     => $json->email
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
            $ticketsInfo['total'] += $ticketInfo['sold'];
            $ticketsInfo['ticketTypes'][] = $ticketInfo;
        }

        return $ticketsInfo;
    }

    /**
     * @param array $event
     *
     * @return array
     */
    protected function convertEventMainDetails($event)
    {
        $keys = [
            'id' => 'id',
            'start_time' => 'start',
            'end_time' => 'end',
            'street_address' => 'street_address',
            'cover_photo' => 'logo',
            'description' => 'description',
            'ticket_uri' => 'tickets',
            'location_name' => 'location_name'
        ];

        $event = $this->convertMainDetails($keys, $event);

        return $event;
    }

    /**
     * @param array $keys
     * @param array $array
     *
     * @return array
     */
    protected function convertMainDetails($keys, $array)
    {
        foreach ($keys as $index => $key) {
            if (array_key_exists($index, $array)) {
                $array[$key] = $array[$index];
            } else {
                $array[$key] = "";
            }

            if ($index !== $key) {
                unset($array[$index]);
            }
        }

        return $array;
    }
}