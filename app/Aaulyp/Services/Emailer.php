<?php

namespace App\Aaulyp\Services;

use Illuminate\Support\Facades\Mail;

class Emailer
{
    /**
     * Send welcome email to recipient
     *
     * @param array $recipient
     *
     * @return mixed
     */
    public function sendWelcomeEmail($recipient)
    {
        $response = Mail::send('pages.emails.welcomeEmail', ['firstName' => $recipient['firstName'], 'lastName' => $recipient['lastName']], function ($m) use ($recipient) {
            $fullName = $recipient['firstName'] . " " . $recipient['lastName'];
            $m->from('president.aaulyp@gmail.com', 'Omari Montique');
            $m->to($recipient['email']);
            $m->bcc('pr.aaulyp@gmail.com');
            $m->subject('Welcome to the AAULYP ' . $fullName);
        });
        return $response;
    }

    /**
     * Send welcome email to recipient
     *
     * @param int   $ticketsInfo
     *
     * @return mixed
     */
    public function sendYpWeekendOrdersEmail($ticketsInfo)
    {
        $bcc = array('president.aaulyp@gmail.com');
        $response = Mail::send('pages.emails.ypWeekendOrdersUpdateEmail', ['ticketsInfo' => $ticketsInfo], function ($m) use ($ticketsInfo, $bcc) {
            $m->from('pr.aaulyp@gmail.com', 'AAULYP Communications');
            $m->to('pr.aaulyp@gmail.com');
//            $m->bcc($bcc);
            $m->subject('Texas YP Weekend 2016 Ticket Sold');
        });
        return $response;
    }

    /**
     * Send YP Weekend Status Updates
     *
     * @param int   $ticketsInfo
     *
     * @return mixed
     */
    public function sendJoinWeekMixerOrdersEmail($ticketsInfo)
    {
        $cc = array('president.aaulyp@gmail.com', 'vicepresident.aaulyp@gmail.com', 'social.aaulyp@gmail.com');
        $response = Mail::send('pages.emails.joinWeekMixerEmail', ['ticketsInfo' => $ticketsInfo], function ($m) use ($ticketsInfo, $cc) {
            $m->from('pr.aaulyp@gmail.com', 'AAULYP Communications');
            $m->to('pr.aaulyp@gmail.com');
            $m->cc($cc);
            $m->subject('Join Week Mixer Ticket RSVP');
        });
        return $response;
    }

    /**
     * Send YP Weekend Status Updates
     *
     * @param int   $ticketsInfo
     *
     * @return mixed
     */
    public function sendFinancialMeetUpOrdersEmail($ticketsInfo)
    {
        $cc = array('president.aaulyp@gmail.com', 'vicepresident.aaulyp@gmail.com');
        $response = Mail::send('pages.emails.joinWeekMixerEmail', ['ticketsInfo' => $ticketsInfo], function ($m) use ($ticketsInfo, $cc) {
            $m->from('pr.aaulyp@gmail.com', 'AAULYP Communications');
            $m->to('pr.aaulyp@gmail.com');
            $m->cc($cc);
            $m->subject('Financial Meetup Ticket RSVP');
        });
        return $response;
    }

    /**
     * Send YP Weekend Status Updates
     *
     * @param int   $ticketsInfo
     *
     * @return mixed
     */
    public function sendMembership2017Email($ticketsInfo)
    {
        $cc = array('president.aaulyp@gmail.com', 'vicepresident.aaulyp@gmail.com', 'membership.aaulyp@gmail.com');
        $response = Mail::send('pages.emails.membership2017Email', ['ticketsInfo' => $ticketsInfo], function ($m) use ($ticketsInfo, $cc) {
            $m->from('pr.aaulyp@gmail.com', 'AAULYP Communications');
            $m->to('pr.aaulyp@gmail.com');
            $m->cc($cc);
            $m->subject('Membership Ticket Order');
        });
        return $response;
    }
}