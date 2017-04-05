<?php

namespace App\Http\Controllers;

use App\Aaulyp\Services\EventsBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Event;
use App\Event_Photo;
use App\Aaulyp\Tools\Locations;
use App\Aaulyp\Tools\DateHelper;
use App\Http\Requests\EventRequest;
use App\Http\Requests\AddPhotoRequest;
use App\Aaulyp\Tools\Api\MailchimpApi;

class EventsController extends Controller
{
    protected $states;
    protected $calendarArrays;
    protected $dateHelper;
    protected $mailchimp;
    protected $eventBuilder;


    public function __construct(Locations $locations, DateHelper $dateHelper, MailchimpApi $mailchimp, EventsBuilder $eventBuilder)
    {
        $this->middleware('auth', ['except' => ['show','index','addPhoto', 'getMediaPhotos']]);

        parent::__construct();

        $loc = $locations;
        $this->dateHelper = $dateHelper;
        $this->mailchimp = $mailchimp;
        $this->eventBuilder = $eventBuilder;

        $this->states = $loc->getStates();
        $this->calendarArrays = $this->dateHelper->getCalendarArrays();
    }

    /**
     * Display a listing of all events
     *
     */
    public function index()
    {
        $events = $this->eventBuilder->getCurrentEvents();
        $reversed = array_reverse($events);
        $events = json_decode(json_encode($reversed));

        $pastEvents = $this->eventBuilder->getPastEvents();
        $pastEvents = json_decode(json_encode($pastEvents));

        return view('pages.events.index', compact('events', 'pastEvents'));
    }

    /**
     * Create an event
     *
     */
    public function create(Request $request)
    {
        $data = $this->getEventFormData();

        return view('pages.events.create',$data );
    }

    /**
     * Store newly created resource in storage
     * @param EventRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(EventRequest $request)
    {
        $event = $this->user->publish(
            new Event($request->all())
        );

        flash()->overlay("Success", "Your event has been added");

        return redirect(events_path($event));
    }

    /**
     * @param string $eventId
     *
     * @return mixed
     */
    public function show($eventId)
    {
        $strCount = strlen($eventId);
        $id = str_limit($eventId, $strCount - 2, "");

        $event = $this->eventBuilder->getEventById($id);

        $event = json_decode(json_encode($event));

        $events = $this->eventBuilder->getCurrentEvents();

        $events = json_decode(json_encode($events));

        return view('pages.events.show', compact('event', 'events'));
    }

    /**
     * @param string             $zip
     * @param string             $name
     * @param AddPhotoRequest $request
     *
     * @return mixed
     */
    public function addPhoto($zip, $name, AddPhotoRequest $request)
    {
        $event = Event::locatedAt($zip, $name);

        $photo = Event_Photo::fromFileWithEvent($request->file('photo'), $event)->upload();

        $event->addPhoto($photo);
    }

    public function getMediaPhotos()
    {
        $subscribers = $this->mailchimp->getListSubscribers();

        dd($subscribers);

    }

    protected function getEventFormData()
    {
        $data = [
            "states" => $this->states,
            "calendar" => $this->calendarArrays
        ];

        return $data;
    }
}
