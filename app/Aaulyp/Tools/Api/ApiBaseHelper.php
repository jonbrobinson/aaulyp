<?php

namespace App\Aaulyp\Tools\Api;


use Exception;
use GuzzleHttp\Client;

class ApiBaseHelper
{
    protected $guzzle;

    public function __construct()
    {
        $this->guzzle = $this->getGuzzleClient();
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

    protected function getGuzzleClient()
    {
        $client = new Client();
        return $client;
    }
}