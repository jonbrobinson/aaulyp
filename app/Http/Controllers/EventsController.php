<?php

namespace App\Http\Controllers;

use App\Event;
use App\Event_Photo;
use App\Aaulyp\Tools\Locations;
use App\Aaulyp\Tools\DateHelper;
use App\Http\Requests\EventRequest;
use App\Http\Requests\AddPhotoRequest;

class EventsController extends Controller
{
    protected $states;
    protected $calendarArrays;
    protected $dateHelper;


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show','index','addPhoto']]);

        parent::__construct();
    }

    /**
     * Display a listing of all events
     *
     */
    public function index()
    {
        $events = Event::all();

        return view('pages.events.index', compact('events'));
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
        $this->eventSetUp();

        $name = $request->input('event-name');
        $description = $request->input('event-description');

        Event::create([
                "name" => $name,
                "slug" => str_slug($name),
                "description" => $description,
                "description_plain" =>strip_tags($description, ['<br>']),
                "street" => $request->input('event-street'),
                "city" => $request->input('event-city'),
                "state" => $request->input('event-state'),
                "zip" => $request->input('event-zip'),
                "date_start" => $this->dateHelper->getStartTimeFromRange($request->input('daterangepicker')),
                "date_end" => $this->dateHelper->getEndTimeFromRange($request->input('daterangepicker'))
            ]
        );

        flash()->overlay("Success", "Your event has been added");

        return redirect()->back();
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

//    /**
//     * @param UploadedFile $file
//     * @param Event|null   $event
//     *
//     * @return static
//     */
//    protected function storePhotoFromEvent(UploadedFile $file, Event $event)
//    {
//        return  Event_Photo::fromForm($file->getClientOriginalName(), $event->date_start, $event->name)
//            ->store($file);
//    }

    protected function eventSetUp()
    {
        $locations = new Locations();
        $this->dateHelper = new DateHelper();

        $this->states = $locations->getStates();
        $this->calendarArrays = $this->dateHelper->getCalendarArrays();
    }

    protected function getEventFormData()
    {
        $this->eventSetUp();

        $data = [
            "states" => $this->states,
            "calendar" => $this->calendarArrays
        ];

        return $data;
    }
}
