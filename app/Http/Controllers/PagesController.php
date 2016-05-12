<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('welcome');
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
     * Show the commitee passed in and return the view
     *
     * @param $committee
     *
     * @return \Illuminate\Http\Response
     */
    public function committees($committee)
    {
        $validCommittees = ['community', 'communication', 'fundraising', 'advocacy', 'membership'];

        if (in_array($committee, $validCommittees)) {

            return view('pages.committees.' . $committee);
        }
    }
}
