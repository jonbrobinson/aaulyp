<?php

namespace App\Http\Controllers;

use App\Aaulyp\Tools\Calendar;
use App\Aaulyp\Tools\Locations;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
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
        $locations = new Locations();
        $calendar = new Calendar();


        $states = $locations->getStates();
        $calendarArrays = $calendar->getCalendarArrays();
        $data  = [
            "states" => $states,
            "calendar" => $calendarArrays
        ];

        return view('pages.events.create',$data );
    }

    /**
     * Store newly created resource in storage
     *
     */
    public function store(Request $request)
    {
        $locations = new Locations();
        $calendar = new Calendar();


        $states = $locations->getStates();
        $calendarArrays = $calendar->getCalendarArrays();
        $data  = [
            "states" => $states,
            "calendar" => $calendarArrays
        ];

        return view('pages.events.create',$data );
    }
}
