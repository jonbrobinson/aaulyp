<?php

namespace App\Aaulyp\Tools\Api;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Request;

class GoogleMapsApi
{
    const GOOGLE_MAPS_BASE_URL = "https://maps.googleapis.com/maps/api";

    protected $guzzle;

    public function __construct()
    {
        $this->guzzle = new Guzzle([
            // Base URI is used with relative requests
            'base_uri' => self::GOOGLE_MAPS_BASE_URL,
        ]);
    }

    /**
     * Gets contents of a single folder
     *
     * @return array
     */
    public function getAddressFromLatLong($latitude, $longitude)
    {
        $url = self::GOOGLE_MAPS_BASE_URL . '/geocode/json';
        $headers = [
            'Content-Type' => 'application/json',
        ];
        $query = [
            'latlng' => $latitude . ',' . $longitude,
            'result_type' => 'street_address',
            'key' => env('GOOGLE_API_KEY'),
        ];

        $options = [
            'headers' => $headers,
            'query' => $query
        ];

        $response = $this->guzzle->request('GET', $url, $options);

        $addressJson = json_decode($response->getBody()->getContents());

        if ($addressJson->results) {
            $address = $addressJson->results[0]->formatted_address;
        } else {
            $address = null;
        }

        return $address;
    }
}