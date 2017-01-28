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
        $bcc = array('pr.aaulyp@gmail.com', 'president.aaulyp@gmail.com', 'mrsjadeshaw@gmail.com');
        $bccAll = array('pr.aaulyp@gmail.com', 'mrsjadeshaw@gmail.com');
        $response = Mail::send('pages.emails.ypWeekendOrdersUpdateEmail', ['ticketsInfo' => $ticketsInfo], function ($m) use ($ticketsInfo, $bcc, $bccAll) {
            $m->from('pr.aaulyp@gmail.com', 'AAULYP Communications');
            $m->to('secretary.aaulyp@gmail.com');
            if ((intval($ticketsInfo['total']) % 5) == 0) {
                $m->bcc($bcc);
            } else {
                $m->bcc($bccAll);
            }
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
        $cc = array('president.aaulyp@gmail.com');
        $response = Mail::send('pages.emails.joinWeekMixerEmail', ['ticketsInfo' => $ticketsInfo], function ($m) use ($ticketsInfo, $cc) {
            $m->from('pr.aaulyp@gmail.com', 'AAULYP Communications');
            $m->to('pr.aaulyp@gmail.com');
//            $m->cc($cc);

            $m->subject('Join Week Mixer Ticket RSVP');
        });
        return $response;
    }
}