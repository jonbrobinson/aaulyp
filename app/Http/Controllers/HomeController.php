<?php

namespace App\Http\Controllers;

use App\Aaulyp\Tools\Api\FacebookSdkHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    protected $facebookSdk;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct(FacebookSdkHelper $facebookSdk)
    {
        $this->middleware('auth', ['except' => ['contact', 'adminGet', 'adminPost', 'adminGet']]);

        parent::__construct();

        $this->facebookSdk = $facebookSdk;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->facebookSdk->getCurrentEvents();

        $events = json_decode(json_encode($events));

        return view('welcome', compact('events'));
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'website' => 'size:0'
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'message' => 'Input submission Errors',
                    'errors' => $validator->errors()->all()
                ],400);
        }

        $contact = $request->all();

        $response = Mail::send('pages.emails.contact', ['data' => $contact], function ($m) use ($contact) {
            $m->from($contact['email'], $contact['name']);

            $m->to('president.aaulyp@gmail.com');
            $m->subject('AAULYP CONTACT FORM | ' . $contact['subject']);
        });

        if ($response->getStatusCode() == 200) {
            return response()->json([
                "message" => "Thank You. Your message has been successfully sent"

            ], $response->getStatusCode());
        }

        return response($response->getBody(), $response->getStatusCode());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminGet()
    {
        return view('pages.admin.adminGet');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admin' => 'required|in:'.env('YP_ADMIN'),
        ]);

        if ($validator->fails()) {
            return redirect('/admin')
                ->withErrors($validator)
                ->withInput();
        }

        return view('pages.admin.dashboard', ['success' => 'yes']);
    }
}
