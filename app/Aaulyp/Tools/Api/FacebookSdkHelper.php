<?php

namespace App\Aaulyp\Tools\Api;

use Facebook\Facebook;

class FacebookSdkHelper
{
    const AAULYP_FB_PAGE_ID = 135986973127166;

    protected $facebookHelper;

    public function __construct()
    {
        $this->facebookHelper = new Facebook([
            'app_id' => env('FB_APP_ID'),
            'app_secret' => env('FB_APP_SECRET'),
            'default_graph_version' => 'v2.6',
            'default_access_token' => env('FB_ACCESS_TOKEN'),

        ]);
    }

    /**
     * Gets contents of a single folder
     *
     * @param string $url
     *
     * @return array
     */
    public function getEvents()
    {
        $response = $this->facebookHelper->get('/'.self::AAULYP_FB_PAGE_ID.'/events');

        $body = $response->getDecodedBody();

        $events = $body['data'];

        $transformedEvents = array();
        foreach($events as $event) {
            $transformedEvents[] = $this->transformEventForDb($event);
        }

        dd($transformedEvents);

        return $events;
    }

    public function transformEventForDb($fbEvent)
    {
        $event = array();
        $event['name'] = $fbEvent['name'];
        $event['description'] = isset($fbEvent['description']) ? $fbEvent['description'] : null;
        $event['facebook_id'] = $fbEvent['id'];
        $event['date_start'] = $fbEvent['start_time']  ? $fbEvent['start_time'] : null;
        $event['date_end'] = isset($fbEvent['end_time']) ? $fbEvent['end_time'] : null;
        if (isset($fbEvent['place']) && isset($fbEvent['place']['location'])) {
            $event['city'] = $fbEvent['place']['location']['city'] ? $fbEvent['place']['location']['city'] : null;
            $event['state'] = isset($fbEvent['place']['location']['state']) ? $fbEvent['place']['location']['state'] : null;
            $event['latitude'] = $fbEvent['place']['location']['latitude'] ? $fbEvent['place']['location']['latitude'] : null;
            $event['longitude'] = $fbEvent['place']['location']['longitude'] ? $fbEvent['place']['location']['longitude'] : null;
        }

        return $event;
    }
}