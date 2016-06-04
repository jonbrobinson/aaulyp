<?php

namespace App\Aaulyp\Tools\Api;

use Facebook\Facebook;

class FacebookSdkHelper
{
    const AAULYP_FB_PAGE_ID = 135986973127166;

    protected $facebookHelper;
    protected $googleMaps;
    protected $currentEvent;

    public function __construct(GoogleMapsApi $googleMapsApi)
    {
        $this->facebookHelper = new Facebook([
            'app_id' => env('FB_APP_ID'),
            'app_secret' => env('FB_APP_SECRET'),
            'default_graph_version' => 'v2.6',
            'default_access_token' => env('FB_ACCESS_TOKEN'),

        ]);

        $this->googleMaps = $googleMapsApi;

        date_default_timezone_set('America/Chicago');
    }

    /**
     * Gets contents of a single folder
     *
     * @return array
     */
    public function getEvents()
    {
        $events = $this->getEventsArray();

        $transformedEvents = array();
        foreach($events as $event) {
            $transformedEvents[] = $this->transformEventForDb($event);
        }

        return $transformedEvents;
    }

    public function getCurrentEvents()
    {
        $events = $this->getEventsArray();

        $today = strtotime('today');

        $transformedEvents = array();
        foreach($events as $event) {
            if (strtotime($event['start_time']) < $today) {
                continue;
            }
            $transformedEvents[] = $this->transformEventForDb($event);
        }

        return array_reverse($transformedEvents);
    }

    public function getEventDetails($id)
    {
        $response = $this->facebookHelper->get('/' . $id . '?fields=id,name,category,description,place,cover,attending_count,interested_count,start_time,end_time');

        $body = $response->getDecodedBody();

        $event = $this->transformEventForDb($body);

        return $event;
    }

    protected function getEventsArray()
    {
        $response = $this->facebookHelper->get('/'.self::AAULYP_FB_PAGE_ID.'?fields=events{id,name,category,description,place,cover,attending_count,interested_count,start_time,end_time}');

        $body = $response->getDecodedBody();

        $events = $body['events']['data'];

        return $events;
    }

    /**
     * @param $fbEvent
     *
     * @return array
     */
    public function transformEventForDb($fbEvent)
    {

        $event = $this->convertEventEdgeDetails($fbEvent);

        $event = $this->convertEventMainDetails($event);

        $event['unique_id'] = uniqid('fb');

        return $event;
    }

    /**
     * @param array $event
     *
     * @return array
     */
    public function convertEventMainDetails($event)
    {
        $keys = [
            'category', 'description', 'end_time', 'id', 'name', 'start_time', 'street_address'
        ];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $event)) {
                $event[$key] = null;
            }

            if ($key == 'id') {
                $event['facebook_id'] = $event[$key];
                unset($event[$key]);
            }

            if ($key == 'start_time') {
                $event['date_start'] = $event[$key];

                unset($event[$key]);
            }

            if ($key == 'end_time') {
                $event['date_end'] = $event[$key];
                unset($event[$key]);
            }
        }

        return $event;
    }

    /**
     * @param array $event
     *
     * @return array
     */
    public function convertEventEdgeDetails($event)
    {
        if (isset($event['place']) && isset($event['place']['location'])) {
            $latitude = $event['place']['location']['latitude'];
            $longitude = $event['place']['location']['longitude'];
            unset($event['place']);

            $event['street_address'] = $this->googleMaps->getAddressFromLatLong($latitude, $longitude);

        }
        if (isset($event['cover'])) {
            $event['cover_photo'] = $event['cover']['source'];
            unset($event['cover']);
        }

        return $event;
    }
}