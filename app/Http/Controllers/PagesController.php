<?php

namespace App\Http\Controllers;

use App\Aaulyp\Services\EventsBuilder;
use App\Aaulyp\Tools\Api\MailchimpApi;
use Illuminate\Http\Request;
use App\Aaulyp\Tools\Api\FacebookSdkHelper;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
     * Show the commitee passed in and return the view
     *
     * @param $committee
     *
     * @return \Illuminate\Http\Response
     */
    public function linkedin()
    {
        $file = Storage::get("linkedin_tips.pdf");
        if (true) {
            return view("pages.linkedin", compact('file'));
        }
        $response = response($file, 200)->header('Content-Type', 'application/pdf');

        return $response;
    }

    public function linkedinNotes(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'website' => 'size:0'
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'message' => 'Input submission Errors',
                    'errors' => $validator->errors()->all()
                ],400);
        }

        $linkedIn = $request->all();

        $response = Mail::send('pages.emails.linkedInEmail', ['data' => $linkedIn], function ($m) use ($linkedIn) {
            $m->from('pr.aaulyp@gmail.com', "AAULYP Communications");

            $m->to($linkedIn['email']);
            $m->bcc('pr.aaulyp@gmail.com');
            $m->subject('AAULYP LinkedIn Tips');
            $m->attach(public_path("/assets/pdf/linkedIn_tips.pdf"), ["as" => "linkedInTips.pdf", "mime" => "application/pdf"]);
        });

        $statusCode = $response->getStatusCode();
        if ($statusCode == 200) {
            return response()->json([
                "message" => "Thank You. Your message has been successfully sent"

            ], $statusCode);
        }

        return response($response->getBody(), $statusCode);
    }

    /**
     * Test Page
     */
    public function test()
    {

    }

    /**
     * Volunteer Request Form
     */
    public function signin()
    {
        return view('pages.signin');
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
