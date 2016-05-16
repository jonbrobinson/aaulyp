<?php

namespace App\Aaulyp\Tools\Api;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Request;

class Eventbrite
{
    public $test = "test";

    const EVENTBRITE_BASE_URL = "https://www.eventbriteapi.com/v3/";

    protected $guzzle;

    public function __construct()
    {
        $this->guzzle = $client = new Guzzle([
            // Base URI is used with relative requests
            'base_uri' => self::EVENTBRITE_BASE_URL,
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
            'Verify' => true
        ];

        $options = [
            'headers' => $headers,
        ];

        $response = $this->guzzle->request('GET', $url, $options);

        $orderJson = json_decode($response->getBody()->getContents());

        $orderInfo = $this->getOrderInfoFromJson($orderJson);

        return $orderInfo;
    }

    /**
     *
     */
    protected function getOrderInfoFromJson($json)
    {
        $orderInfo = [
            'firstName' => $json->firs_name,
            'lastName'  => $json->last_name,
            'email'     => $json->email
        ];

        return $orderInfo;
    }
}