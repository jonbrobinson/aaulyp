<?php

namespace App\Aaulyp\Services;

use App\Aaulyp\Tools\Api\GoogleMapsApi;

class EventFormatter
{
    protected function createFile($file)
    {
        $directory = dirname($file);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        touch($file);

        return $file;
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
     * Convert Details of an Event
     *
     * @param array $keys
     * @param array $event
     *
     * @return array
     */
    protected function convertDetails($keys, $event)
    {
        $newEvent = array();

        foreach ($keys as $index => $key) {
            if (array_key_exists($key, $event)) {
                $newEvent[$index] = $event[$key];
            } else {
                $newEvent[$index] = "";
            }
        }

        return $newEvent;
    }

    /**
     * @param string $platform
     * @param array  $relations
     * @param array  $event
     *
     * @return array
     */
    protected function convertEventToStandard($platform, $relations, $event)
    {
        $finalEvent = $this->convertDetails($relations, $event);

        $finalEvent['platform'] = $platform;

        return $finalEvent;
    }
}