<?php

namespace App\Http\Controllers;

use App\Aaulyp\Services\EventsBuilder;
use Illuminate\Http\Request;
use App\Aaulyp\Tools\Api\FacebookSdkHelper;

use App\Http\Requests;

class PagesController extends Controller
{
    protected $facebookSdk;
    protected $eventBuilder;

    public function __construct(FacebookSdkHelper $facebookSdk, EventsBuilder $eventsBuilder)
    {
        parent::__construct();

        $this->facebookSdk = $facebookSdk;
        $this->eventBuilder = $eventsBuilder;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $events = $this->eventBuilder->getCurrentEvents();

        $reversed = array_reverse($events);

        $events = json_decode(json_encode($reversed));

        return view('welcome', compact('events'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function aaulyp()
    {
        return view('pages.aaulyp');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function aaul()
    {
        return view('pages.aaul');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function join()
    {
        return view('pages.join');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function board()
    {
        return view('pages.board');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {
        return view('pages.faq');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Show the donation page
     */
    public function donate()
    {
       return view('pages.donate');
    }

    /**
     * Show the commitee passed in and return the view
     *
     * @param $committee
     *
     * @return \Illuminate\Http\Response
     */
    public function committees($committee)
    {
        $validCommittees = ['community', 'communication', 'development', 'fundraising', 'advocacy', 'membership'];

        if (in_array($committee, $validCommittees)) {

            return view('pages.committees.' . $committee);
        }

        abort('404');
    }

    /**
     * Volunteer Request Form
     */
    public function volunteerRequest()
    {
        return view('pages.volunteerRequest');
    }

    /**
     * Show the TEXAS YP WEEKEND PAGE
     */
    public function ypweekend()
    {
        return view('ypwOnePage');
    }
}
