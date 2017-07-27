<?php

namespace App\Aaulyp\Tools\Api;

use App\Aaulyp\Services\EventFormatter;
use Facebook\Facebook;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Support\Facades\Event;

class FacebookSdkHelper extends EventFormatter
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
            $transformedEvents[] = $this->processSingleEvent($event);
        }

        return $transformedEvents;
    }

    /**
     * @param array $event
     *
     * @return array
     */
    protected function processSingleEvent($event)
    {
        $eventDetails = $this->addRelationalDetails($event);
        $relations = $this->getFacebookRelations();
        $finalEvent = $this->convertEventToStandard('facebook', $relations, $eventDetails);

        return $finalEvent;
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

            $transformedEvents[] = $this->processSingleEvent($event);
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
            $transformedEvents[] = $this->processSingleEvent($event);
        }

        return $transformedEvents;
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

    protected function addRelationalDetails($event)
    {
        $venue = $this->getSimpleVenueDetails();

        if (!empty($event['place']) && !empty($event['place']['location'])) {
            $venue = $this->transformVenueDetails($event['place']);
        }

        $event['venue_address'] = $venue;

        if (isset($event['cover'])) {
            $event['cover_image'] = $event['cover']['source'];
        }

        $event['description'] = array(
            'text' => $event['description'],
            'html' => nl2br($event['description'])
        );

        $event['name'] = array(
            'text' => $event['name'],
            'html' => nl2br($event['name'])
        );

        if(!empty($event['start_time'])) {

            $event['start_epoch'] = strtotime($event['start_time']);
        }

        if (!empty($event['end_time'])) {
            $event['end_epoch'] = strtotime($event['end_time']);
        }

        $event['platform_url'] = "https://www.facebook.com/events/".$event['id'];


        return $event;
    }

    /**
     * @param $fbEvent
     *
     * @return array
     */
    public function transformEventForDb($fbEvent)
    {
        $event = $this->addRelationalDetails($fbEvent);

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

    protected function transformVenueDetails($venueDetails)
    {
        $fbKeys = array('street', 'city', 'zip', 'state');
        $details = $this->getSimpleVenueDetails();
        $missingFbKeys = array();

        if ((isset($venueDetails['location']))) {
            foreach ($fbKeys as $fbKey) {
                if (!array_key_exists($fbKey, $venueDetails['location'])) {
                    $missingFbKeys[] = $fbKey;
                    continue;
                }

                if (empty($venueDetails['location'][$fbKey])) {
                    $missingFbKeys[] = $fbKey;
                    continue;
                }
            }
        }

        $missingCount = count($missingFbKeys);

        if (isset($venueDetails['name'])) {
            $details['name'] = $venueDetails['name'];
        }

        if ($missingCount > 0) {
            $latitude = $venueDetails['location']['latitude'];
            $longitude = $venueDetails['location']['longitude'];
            $mapsAddress = $this->googleMaps->getAddressFromLatLong($latitude, $longitude);
            $details['display'] = $mapsAddress['formatted_address'];

            return $details;
        }

        $details['address'] = $venueDetails['location']['street'];
        $details['city'] = $venueDetails['location']['city'];
        $details['postal_code'] = $venueDetails['location']['zip'];
        $details['state'] = $venueDetails['location']['state'];

        $details['display'] = $details['address'].", ".$details['city'].", ".$details['state']." ".$details['postal_code'];

        return $details;
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

    /**
     * @return array
     */
    protected function getFacebookRelations()
    {
        $relations = [
            'id' => 'id',
            'title' => 'name',
            'description' => 'description',
            'time_start' => 'start_epoch',
            'time_end' => 'end_epoch',
            'venue' => 'venue_address',
            'cover_image' => 'cover_image',
            'ticket_url' => 'ticket_uri',
            'platform_url' => 'platform_url',
        ];

        return $relations;
    }
}