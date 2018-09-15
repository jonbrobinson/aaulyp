<?php

namespace App\Aaulyp\Services;

use App\Aaulyp\Constants\ApiConstants;
use App\Aaulyp\Tools\Api\FacebookSdkHelper;
use App\Aaulyp\Tools\Api\EventbriteApi;
use Illuminate\Support\Facades\Storage;

class EventsBuilder
{
    protected $facebookSdk;
    protected $eventbriteApi;

    public function __construct(FacebookSdkHelper $facebookSdk, EventbriteApi $eventbrite)
    {
        $this->facebookSdk = $facebookSdk;
        $this->eventbriteApi = $eventbrite;
    }

    /**
     * @param $id
     *
     * @return array
     */
    public function getEventById($id)
    {
        $events = $this->getLatestContents();
        foreach ($events as $event) {
            if ($id == $event['id']) {

                return $event;
            }
        }

        return [];
    }

    /**
     * @return array
     */
    public function getLatestContents()
    {
        $latestFile = $this->getLatestEventFile();
        $pattern = "/[0-9]+/";
        preg_match($pattern, $latestFile, $matches);

        $fileTimestamp = $matches[0];

        if (false == $this->isLastTenMinutes(time(), $fileTimestamp)) {
//            $this->buildEventsFile();
        }

        $encoded = file_get_contents($latestFile);

        $events = json_decode($encoded, true);

        return $events;
    }

    public function buildEventsFile()
    {
        $events = $this->requestEventsFromApis();
        $sorted = $this->buildSortEventsByTime($events);
        $valid = $this->sanitizeSortedEvents($sorted);
        $file = $this->buildSortedFile($valid);

        return $file;
    }

    /**
     * @param array $events
     *
     * @return array
     */
    public function getCurrentEvents()
    {
        $events = $this->getLatestContents();

        $today = strtotime('today');

        $currentEvents = array();
        foreach($events as $event) {
            if ($event['time_start'] > $today) {
                $currentEvents[] = $event;
            }
        }

        return $currentEvents;
    }

    /**
     * @param int $limit
     *
     * @return array
     */
    public function getPastEvents($limit = 10)
    {
        $events = $this->getLatestContents();

        $pastDate = strtotime('today');

        $pastEvents = array();
        foreach($events as $index => $event) {
            if ($index > $limit - 1) {
                continue;
            }

            if ($event['time_start'] < $pastDate) {
                $pastEvents[] = $event;
            }
        }

        return $pastEvents;
    }

    public function getLatestEventFile()
    {
        $directory = "cache/events";

        $files = $this->getFilesByStorageDirectory($directory);

        $latestIndex = 0;

        for ($i = 0; $i < count($files); $i++) {
            $pattern = "/[0-9]+/";
            preg_match($pattern, $files[$i], $matches);

            $currentTime = $matches[0];

            $max = max(0, $currentTime);

            if ($max == $currentTime) {
                $latestIndex = $i;
            }
        }

        $directory = storage_path()."/app/";

        return $directory.$files[$latestIndex];
    }

    public function deleteFilesByTimestamp($timestamp)
    {
        $directory = "cache/events";

        $files = $this->getFilesByStorageDirectory($directory);

        $delete = array();

        for ($i = 0; $i < count($files); $i++) {
            $pattern = "/[0-9]+/";
            preg_match($pattern, $files[$i], $matches);

            $fileTime = $matches[0];

            if ($timestamp > $fileTime) {
                $delete[] = $files[$i];
            }
        }

        Storage::delete($delete);
    }

    /**
     *
     */
    public function getCurrentEventTicketInfo()
    {
        $ebEvents = [];
        $events = $this->getCurrentEvents();
        foreach($events as $event) {
            if($event['platform'] == ApiConstants::EVENTBRITE) {
                $ebEvents[] = $event;
            }
        }

        return array_reverse($ebEvents);
    }

    public function getEventsByPlatform($platform)
    {
        $platformEvents = [];
        $events = $this->getCurrentEvents();
        foreach($events as $event) {
            if($event['platform'] == $platform) {
                $platformEventsEvents[] = $event;
            }
        }

        return array_reverse($platformEvents);
    }

    protected function isLastTenMinutes($maxTimestamp, $checkTimestamp)
    {
        $min = strtotime(date('c', $maxTimestamp)." -10 minutes");
        $max = $maxTimestamp;

        if ($checkTimestamp > $min && $checkTimestamp < $max) {
            return true;
        }

        return false;
    }

    protected function validRange($int, $min, $max)
    {
        if ($min<$int && $int<$max) {
            return true;
        }

        return false;
    }

    /**
     * @param string $directory
     *
     * @return mixed
     */
    protected function getFilesByStorageDirectory($directory)
    {
        $files = Storage::files($directory);

        return $files;
    }

    /**
     * @param array $events
     *
     * @return bool|string
     */
    protected function buildSortedFile($events)
    {
        $eventsString = json_encode($events);

        $timestamp = strtotime('now');

        $storage_path = 'cache/events/events_all_'.$timestamp.'.json';
        $complete = Storage::put($storage_path, $eventsString);

        if (!$complete) {
            return false;
        }

        return storage_path("app/".$storage_path);
    }

    /**
     * @param array $events
     *
     * @return array
     */
    protected function buildSortEventsByTime($events)
    {
        $sorted = array();

        foreach ($events as $event) {
            $time_start = $event->time_start;
            $sorted[$time_start] = array($event->platform => $event);
        }

        krsort($sorted);

        return $sorted;
    }

    protected function requestEventsFromApis()
    {
        // $fbEvents = $this->facebookSdk->getEvents();
        $fbEvents = [];

        $ebEvents = $this->eventbriteApi->getYpEvents();

        $events = array_merge($fbEvents, $ebEvents);

        return $events;
    }

    /**
     * @param array  $events
     *
     * @return array
     */
    protected function sanitizeSortedEvents($events)
    {
        $validEvents = array();

        foreach ($events as $time => $platforms) {
            if (count($platforms) > 1) {
                $validEvents[] = $events[$time][ApiConstants::EVENTBRITE];
                continue;
            }

            if (array_key_exists(ApiConstants::FACEBOOK, $events[$time])) {
                $validEvents[] = $events[$time][ApiConstants::FACEBOOK];
                continue;
            }

            if (array_key_exists(ApiConstants::EVENTBRITE, $events[$time])) {
                $validEvents[] = $events[$time][ApiConstants::EVENTBRITE];
                continue;
            }
        }

        return $validEvents;
    }
}