<?php

namespace App\Http\Controllers;

use App\Aaulyp\Constants\ApiConstants;
use App\Aaulyp\Models\AttendeeModel;
use App\Aaulyp\Services\AdminHelper;
use App\Aaulyp\Services\EventsBuilder;
use App\Aaulyp\Tools\Api\MailchimpApi;
use App\Aaulyp\Tools\Toolbox;
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
    protected $mailchimpApi;
    protected $adminHelper;

    public function __construct(FacebookSdkHelper $facebookSdk, EventsBuilder $eventsBuilder, MailchimpApi $mailchimpApi, AdminHelper $adminHelper)
    {
        parent::__construct();

        $this->facebookSdk = $facebookSdk;
        $this->eventBuilder = $eventsBuilder;
        $this->mailchimpApi = $mailchimpApi;
        $this->adminHelper = $adminHelper;
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
     * @param Request $request
     *
     * @return Response
     */
    public function join(Request $request)
    {
        $redirect = filter_var($request->get('rd'), FILTER_VALIDATE_BOOLEAN);

        if($redirect) {
            return view('pages.join_redirect');
        }
        return view('pages.join');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function board()
    {
        $officers = $this->adminHelper->getSortedPositionsByType('officer');
        $chairs = $this->adminHelper->getSortedPositionsByType('chair');

        return view('pages.positions', compact('officers', 'chairs'));
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
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function signinform(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'event' => 'required|string',
            'website' => 'size:0'
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'message' => 'Input submission Errors',
                    'errors' => $validator->errors()->all()
                ],400);
        }

        $trimmedName = $request->input("name");
        $attendee = new AttendeeModel();
        $attendee->email = strtolower($request->input("email"));
        $attendee->eventName = $request->input("event");
        $attendee->eventDate = $request->input("datepicker");
        $attendee->firstEvent = filter_var($request->input("ypFirst"), FILTER_VALIDATE_BOOLEAN);
        $attendee->addToMailList = filter_var($request->input("mailList"), FILTER_VALIDATE_BOOLEAN);
        $timestampAdded = time();
        $attendee->dateTimeAdded = date('m/d/Y h:i:sa', $timestampAdded);
        $attendee->lastModifiedTimestamp = $timestampAdded;

        $names = explode(" ", $trimmedName);
        if (count($names) > 1) {
            $attendee->firstName = $names[0];
            $attendee->lastName = $names[1];
        } else {
            $attendee->firstName = $names[0];
        }

        $attendanceDir = 'yp/attendance';
        $filename = $timestampAdded.'_'.Toolbox::getCryptRandomText().'.json';
        $attendanceFileLocation = $attendanceDir.'/'.$filename;
        Storage::put($attendanceFileLocation, json_encode($attendee));

        $newSubscribe = "unsubscribed";
        $updateSubscribe = null;

        if ($attendee->addToMailList) {
            $newSubscribe = "subscribed";
            $updateSubscribe = "subscribed";
        }

        $addedToMailChimp = true;
        try {
            $this->mailchimpApi->addAttendeeToList(ApiConstants::MC_GENERAL_BODY_LIST_ID, $attendee, $newSubscribe, $updateSubscribe);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            $errorCode = $e->getCode();
            $addedToMailChimp = false;
        }

        return response()->json([
            "message" => "Thank You. Glad you could make it"
        ], 200);
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
