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
        $response = Mail::send('pages.emails.ypWeekendOrdersUpdateEmail', ['ticketsInfo' => $ticketsInfo], function ($m) {
            $m->from('pr.aaulyp@gmail.com', 'AAULYP Communications');
            $m->to('secretary.aaulyp@gmail.com');
            $m->bcc('pr.aaulyp@gmail.com');
            $m->subject('Texas YP Weekend 2016 Ticket Sold');
        });
        return $response;
    }
}