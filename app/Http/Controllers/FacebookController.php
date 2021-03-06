<?php

namespace App\Http\Controllers;

use App\Aaulyp\Tools\Api\FacebookSdkHelper;
use Illuminate\Http\Request;

use App\Http\Requests;

class FacebookController extends Controller
{
    protected $facebookSdk;

    public function __construct(FacebookSdkHelper $facebookSdk)
    {
        parent::__construct();

        $this->facebookSdk = $facebookSdk;
    }

    /**
     * Display a listing of all events
     *
     */
    public function index()
    {
//        $events = Event::with('user')->orderBy('date_start', 'desc')->get();
//        $eventsFeatured = Event::with('user')->where('feature_event', 1)->get();

        $events = $this->facebookSdk->getCurrentEvents();

        $events = json_decode(json_encode($events));

        $pastEvents = $this->facebookSdk->getPastEvents();

        $pastEvents = json_decode(json_encode($pastEvents));

        return view('pages.events.index', compact('events', 'pastEvents'));
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
     * @param string $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $eventArray = $this->facebookSdk->getEventDetails($id);
        $events = json_decode(json_encode($this->facebookSdk->getCurrentEvents()));
//        dd($events);

        $event = json_decode(json_encode($eventArray));

        return view('pages.facebook.show', compact('event', 'events'));
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function showAlbum($id)
    {
        $albumArray = $this->facebookSdk->getAlbumDetails($id);

        $album = json_decode(json_encode($albumArray));

        return view('pages.facebook.albumShow', compact('album'));
    }

    /**
     *
     * @return mixed
     */
    public function photos()
    {
        $allAlbums = $this->facebookSdk->getAlbums();

        $albums = json_decode(json_encode($allAlbums['albums']));

        $next = $this->facebookSdk->getNextPage($allAlbums['paging']['next']);

        $page2 = json_decode(json_encode($next['albums']));

        return view('pages.photos', compact('albums', 'page2'));
    }
}
