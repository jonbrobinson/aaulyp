<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aaulyp\Tools\Api\FacebookSdkHelper;

use App\Http\Requests;

class PagesController extends Controller
{
    protected $facebookSdk;

    public function __construct(FacebookSdkHelper $facebookSdk)
    {
        parent::__construct();

        $this->facebookSdk = $facebookSdk;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $events = $this->facebookSdk->getCurrentEvents();

        $events = json_decode(json_encode($events));

        return view('welcome', compact('events'));
//        return view('pages.soon');
//        return view('onePage');
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
