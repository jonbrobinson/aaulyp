<?php

namespace App\Http\Controllers;

use App\Event;
use App\Event_Photo;
use App\Aaulyp\Tools\Locations;
use App\Aaulyp\Tools\DateHelper;
use App\Http\Requests\EventRequest;
use App\Http\Requests\AddPhotoRequest;
use App\Aaulyp\Tools\Api\MailchimpApi;
use App\Aaulyp\Tools\Api\FacebookSdkHelper;

class EventsController extends Controller
{
    protected $states;
    protected $calendarArrays;
    protected $dateHelper;
    protected $mailchimp;


    public function __construct(Locations $locations, DateHelper $dateHelper, MailchimpApi $mailchimp, FacebookSdkHelper $facebookSdk)
    {
        $this->middleware('auth', ['except' => ['show','index','addPhoto', 'getMediaPhotos']]);

        parent::__construct();

        $loc = $locations;
        $this->dateHelper = $dateHelper;
        $this->mailchimp = $mailchimp;
        $this->facebookSdk = $facebookSdk;

        $this->states = $loc->getStates();
        $this->calendarArrays = $this->dateHelper->getCalendarArrays();
    }

    /**
     * Display a listing of all events
     *
     */
    public function index()
    {
//        $events = Event::with('user')->orderBy('date_start', 'desc')->get();
        $eventsFeatured = Event::with('user')->where('feature_event', 1)->get();

        $events = $this->facebookSdk->getCurrentEvents();

        $events = json_decode(json_encode($events));

        return view('pages.events.index', compact('events', 'eventsFeatured'));
    }

    /**
     * Create an event
     *
     */
    public function create()
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
     * @param string $zip
     * @param string $title
     *
     * @return mixed
     */
    public function show($zip, $title)
    {
        $event = Event::locatedAt($zip, $title);

        return view('pages.events.show', compact('event'));
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
