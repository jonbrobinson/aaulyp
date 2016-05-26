<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 8/10/15
 * Time: 10:40 PM
 */

namespace App\Fliir\Services\Events;

use App;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Request;

class EventRepository
{
    const EVENTBRITE_API_BASE_URL = "https://www.eventbriteapi.com/v3";

    protected $client;

    /**
     *
     */
    public function __construct()
    {
        $this->client = new Guzzle([
            "base_uri"    => "https://www.eventbriteapi.com/v3/"
        ]);

        $this->token = env("EVBRITE_OATH_PERSONAL", "BadToken");
    }

    public function getAll()
    {

        $headers = [
            "Authorization" => "Bearer " . $this->token,
            "Content-Type"  => "application/json"
        ];

        $query = [
            "token" => $this->token,
            "q" => "happy hour",
            "venue.city" => "austin"
        ];
        $options = [
            "query" => $query
        ];

        $url = self::EVENTBRITE_API_BASE_URL ."/events/search/" ;
        $request = new Request('GET', $url);

        $response = $this->client->send($request, $options);
        $json = $response->getBody()->getContents();

        $contents = json_decode($json, true);

        return $contents;
    }

    /**
     *
     */
    public function getSome()
    {

        $events = App\Events::all();


        return $events;
    }

    /**
     * @param string $id
     */
    public function getEvent($id)
    {
        $event = App\Events::where('event_id', $id)
            ->get();

        return $event;
    }


    public function yes()
    {
        $test = true;

        return $test;
    }
}