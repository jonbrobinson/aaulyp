<?php

namespace App\Http\Controllers;

use App\Aaulyp\Tools\DateHelper;
use App\Aaulyp\Tools\Locations;
use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    protected $states;
    protected $calendarArrays;
    protected $dateHelper;

    /**
     * Display a listing of all events
     *
     */
    public function index()
    {
        return view('pages.events.index');
    }

    /**
     * Create an event
     *
     */
    public function create()
    {
//        flash()->success("Success", "This is an overlay");

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

        Event::create([
                "name" => $request->input('event-name'),
                "description" => $request->input('event-description'),
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

        return view('events.show', compact('$event'));
    }

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
