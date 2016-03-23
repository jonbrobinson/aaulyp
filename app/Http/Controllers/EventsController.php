<?php

namespace App\Http\Controllers;

use App\Aaulyp\Tools\Calendar;
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
        $data  = $data  = $this->getEventFormData();

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

        // validate the form
        // persist the flyer
        //redirect to the landing page
        $event = new Event();
        $event->name = $request->input('event-name');
        $event->description = $request->input('event-description');
        $event->street = $request->input('event-street');
        $event->city = $request->input('event-city');
        $event->state = $request->input('event-state');
        $event->zip = $request->input('event-zip');
        $event->date_start = $this->dateHelper->getStartTimeFromRange($request->input('daterangepicker'));
        $event->date_end = $this->dateHelper->getEndTimeFromRange($request->input('daterangepicker'));

        $event->save();


        return redirect()->back();
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
