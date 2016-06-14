<?php

namespace App\Aaulyp\Tools\Api;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Request;
use Psy\Exception\Exception;

class EventbriteApi
{
    const EVENTBRITE_BASE_URL = "https://www.eventbriteapi.com/v3/";
    const YP_WEEKEND_ID = 25893386817;

    protected $guzzle;

    public function __construct()
    {
        $this->guzzle = new Guzzle([
            // Base URI is used with relative requests
            'base_uri' => self::EVENTBRITE_BASE_URL,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
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
        $headers = [
            'Authorization' => 'Bearer ' . env('EVENTBRITE_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        $options = [
            'headers' => $headers
        ];

        try {
            $response = $this->guzzle->request('GET', $url, $options);
        } catch (Exception $e) {
            return $e->getMessage();
        }


        $orderJson = json_decode($response->getBody()->getContents());

        $orderInfo = $this->getOrderInfoFromJson($orderJson);

        return $orderInfo;
    }

    public function getYpWeekendOrders()
    {
        $orders = $this->getEventOrders(self::YP_WEEKEND_ID);

        return $orders;
    }

    public function getYpWeekendTicketInfo()
    {
        $ticketClasses = $this->getTicketClassInfo(self::YP_WEEKEND_ID);

        $ticketsInfo = $this->convertTicketsInfo($ticketClasses);

        return $ticketsInfo;
    }

    public function getEventOrders($id)
    {
        $url = self::EVENTBRITE_BASE_URL . "events/{$id}/orders";
        $headers = [
            'Authorization' => 'Bearer ' . env('EVENTBRITE_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        $options = [
            'headers' => $headers
        ];

        try {
            $response = $this->guzzle->request('GET', $url, $options);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $orders = json_decode($response->getBody()->getContents());

        return $orders;
    }

    public function getTicketClassInfo($id)
    {
        $url = self::EVENTBRITE_BASE_URL . "events/{$id}/ticket_classes";
        $headers = [
            'Authorization' => 'Bearer ' . env('EVENTBRITE_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        $options = [
            'headers' => $headers
        ];

        try {
            $response = $this->guzzle->request('GET', $url, $options);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $ticketClasses = $response->getBody()->getContents();

        return $ticketClasses;
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

        foreach ($json->ticket_classes as $key => $ticketClass) {
            $ticketInfo = array();
            $ticketInfo['name'] = $ticketClass->name;
            $ticketInfo['price'] = $ticketClass->cost;
            $ticketInfo['sold'] = $ticketClass->quantity_sold;
            $ticketsInfo[$key][]= $ticketInfo;
        }

        return $ticketsInfo;
    }
}