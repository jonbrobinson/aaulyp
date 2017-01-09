<?php

namespace App\Aaulyp\Tools\Api;

use Facebook\Facebook;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Support\Facades\Event;

class FacebookSdkHelper
{
    const AAULYP_FB_PAGE_ID = 135986973127166;
    const FB_BASE_URL = 'https://graph.facebook.com/v2.6/';

    protected $facebookHelper;
    protected $googleMaps;
    protected $currentEvent;
    protected $albumBlacklist = array('352412258151302', '139721309420399', '574486469277212', '136089056450291');

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

        $this->guzzle = new Guzzle([
            // Base URI is used with relative requests
            'base_uri' => self::FB_BASE_URL,
        ]);
    }

    public function getAlbums()
    {
        $fbAlbums = $this->getAlbumsArray(10, 4);

        $transformedAlbums = $this->sanitizeAlbums($fbAlbums);

        return $transformedAlbums;
    }

    public function getNextPage($url)
    {
        $response = $this->guzzle->request('GET', $url);

        $pageArray = json_decode($response->getBody()->getContents(), true);

        $sanitizedArray = $this->sanitizeAlbums($pageArray);

        return $sanitizedArray;
    }

    protected function sanitizeAlbums($albums)
    {
        $transformedAlbums = array();

        foreach ($albums['data'] as $album) {
            if (in_array($album['id'], $this->albumBlacklist)) {
                continue;
            }

            $transformedAlbums['albums'][] = $this->transformAlbumForDb($album);
        }

        $transformedAlbums['paging'] = $albums['paging'];

        return $transformedAlbums;
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

    public function getPastEvents()
    {
        $events = $this->getEventsArray();

        $pastDate = strtotime('today -3 months');

        $transformedEvents = array();
        foreach($events as $event) {
            if (strtotime($event['start_time']) < $pastDate) {
                continue;
            }
            $transformedEvents[] = $this->transformEventForDb($event);
        }

        return array_reverse($transformedEvents);
    }

    public function getEventDetails($id)
    {
        $uri =  $id . '?fields=id,name,category,description,place,cover,attending_count,interested_count,start_time,end_time,ticket_uri';

        $body = $this->getBodyFromRequest($uri);

        $event = $this->transformEventForDb($body);

        return $event;
    }

    public function getAlbumDetails($id)
    {
        $uri =  $id . '?fields=id,name,description,place,cover_photo,link,location,count';

        $album = $this->getBodyFromRequest($uri);

        $album['photos'] = $this->getAlbumPhotos($album['id'], $album['count']);

        $album = $this->transformAlbumForDb($album);

        return $album;
    }

    protected function getAlbumPhotos($id, $count = 25)
    {
        $uri = $id.'/photos?fields=id,images,link,picture&limit='.$count;

        $photos = $this->getBodyFromRequest($uri);

        return $photos['data'];
    }

    protected function getEventsArray()
    {
        $uri = self::AAULYP_FB_PAGE_ID.'?fields=events{id,name,category,description,place,cover,attending_count,interested_count,start_time,end_time,ticket_uri}';

        $body = $this->getBodyFromRequest($uri);

        $events = $body['events']['data'];

        return $events;
    }

    protected function getAlbumsArray($albumLimit = 10, $photoLimit = 5)
    {
        $uri = self::AAULYP_FB_PAGE_ID.'?fields=albums.order(reverse_chronological).limit('.$albumLimit.'){id,name,category,description,link,photos.limit('.$photoLimit.'){id,picture,images}}';

        $body = $this->getBodyFromRequest($uri);

        $events = $body['albums'];

        return $events;
    }

    protected function transformAlbumForDb($fbAlbum)
    {
        $album = $this->convertAlbumEdgeDetails($fbAlbum);

        $album = $this->convertAlbumMainDetails($album);

        return $album;
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
    protected function convertEventMainDetails($event)
    {
        $keys = [
            'start_time' => 'date_start',
            'id' => 'facebook_id',
            'end_time' => 'date_end',
            'street_address' => 'street_address',
            'cover_photo' => 'cover_photo',
            'description' => 'description',
            'ticket_uri' => 'tickets',
            'location_name' => 'location_name'
        ];

        $event = $this->convertMainDetails($keys, $event);

        return $event;
    }

    /**
     * @param array $album
     *
     * @return array
     */
    protected function convertAlbumMainDetails($album)
    {
        $keys = [
            'id' => 'album_id',
            'description' => 'description'
        ];

        $album = $this->convertMainDetails($keys, $album);

        return $album;
    }

    public function convertMainDetails($keys, $array)
    {
        foreach ($keys as $index => $key) {
            if (array_key_exists($index, $array)) {
                $array[$key] = $array[$index];
            } else {
                $array[$key] = null;
            }
            if ($index !== $key) {
                unset($array[$index]);
            }
        }

        return $array;
    }

    protected function getBodyFromRequest($uri)
    {
        $response = $this->facebookHelper->get('/'.$uri);

        $body = $response->getDecodedBody();

        return $body;
    }

    /**
     * @param array $event
     *
     * @return array
     */
    protected function convertEventEdgeDetails($event)
    {
        if (isset($event['place']) && (isset($event['place']['location']) || isset($event['place']['name']))) {
            if (isset($event['place']['location'])) {
                if($event['place']['location']['city'] &&
                    $event['place']['location']['street'] &&
                    $event['place']['location']['zip'] &&
                    $event['place']['location']['state']) {
                    $event['street_address'] = $event['place']['location']['street'].', '.$event['place']['location']['city'].', '.$event['place']['location']['state'].' '.$event['place']['location']['zip'];
                } else {
                    $latitude = $event['place']['location']['latitude'];
                    $longitude = $event['place']['location']['longitude'];
                    $event['street_address'] = $this->googleMaps->getAddressFromLatLong($latitude, $longitude);
                }

            } elseif ($event['place']) {
                $event['street_address'] = $event['place']['name'];
            }

            if ($event['place']['name']) {
                $event['location_name'] = $event['place']['name'];
            }

            unset($event['place']);
        }

        if (isset($event['cover'])) {
            $event['cover_photo'] = $event['cover']['source'];
            unset($event['cover']);
        }

        return $event;
    }

    /**
     * @param array $album
     *
     * @return array
     */
    protected function convertAlbumEdgeDetails($album)
    {
        if (isset($album['photos']) && isset($album['photos']['data'])) {
            $album['photos'] = $album['photos']['data'];
        }

        return $album;
    }
}