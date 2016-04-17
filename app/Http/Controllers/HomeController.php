<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['contact']]);

        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
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
        ]);

        if ($validator->fails()) {
            dd($validator->errors()->all());
            return response("My Validator Fails", 412);
        }

        $contact = $request->all();

        $response = Mail::send('pages.emails.contact', ['data' => $contact], function ($m) use ($contact) {
            $m->from($contact['email'], $contact['name']);

            $m->to('pr.aaulyp@gmail.com');
            $m->subject('AAULYP CONTACT FORM | ' . $contact['subject']);
        });


        dd($response);


        return view('welcome');
    }
}
