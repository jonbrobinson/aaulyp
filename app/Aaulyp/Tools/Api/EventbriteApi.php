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
            return null;
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

    public function getEventOrders($id)
    {
        $url = self::EVENTBRITE_BASE_URL . "events/{$id}";
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

        return $response;
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
}