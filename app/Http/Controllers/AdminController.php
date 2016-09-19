<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Aaulyp\Tools\Locations;
use App\Aaulyp\Tools\DateHelper;
use App\Aaulyp\Tools\Api\MailchimpApi;
use App\Aaulyp\Tools\Api\FacebookSdkHelper;
use GuzzleHttp\Client as Guzzle;


class AdminController extends Controller
{

    public function __construct(Locations $locations, DateHelper $dateHelper, MailchimpApi $mailchimp, FacebookSdkHelper $facebookSdk)
    {
        $this->middleware('auth', ['except' => ['leadershipCreate','leadershipStore', 'dashboard', 'login']]);
        parent::__construct();

        $loc = $locations;
        $this->dateHelper = $dateHelper;
        $this->mailchimp = $mailchimp;
        $this->facebookSdk = $facebookSdk;

        $this->states = $loc->getStates();
        $this->calendarArrays = $this->dateHelper->getCalendarArrays();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('pages.admin.adminGet');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admin' => 'required|in:'.env('YP_ADMIN'),
        ]);

        if ($validator->fails()) {
            return redirect('/admin')
                ->withErrors($validator)
                ->withInput();
        }

        $team = json_decode(json_encode(Team::all()));

        return view('pages.admin.dashboard', ['success' => 'yes', 'team' => $team]);
    }

    /**
     * Create an event
     *
     */
    public function leadershipCreate()
    {
        $data = $this->getEventFormData();

//        $uuid = uniqid(time()."-");

        return view('pages.admin.leadershipCreate',compact('data') );
    }

    /**
     * Store newly created resource in storage
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function leadershipStore(Request $request)
    {
        $teamMember = new Team($request->all());

        $teamMember->save();

        return redirect()->action('AdminController@dashboard')->withInput(['admin' => env('YP_ADMIN')]);
    }

    /**
     * Store newly created resource in storage
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function leadershipEdit($id)
    {
        $teamMember = Team::find($id);

        dd($teamMember);
    }

    /**
     * Store newly created resource in storage
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function leadershipUpdate(Request $request)
    {
        $teamMember = new Team($request->all());

        dd($teamMember);
        $teamMember->save();
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
