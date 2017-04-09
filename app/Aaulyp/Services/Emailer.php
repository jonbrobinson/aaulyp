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
     * Send YP Weekend Status Updates
     *
     * @param int   $ticketsInfo
     *
     * @return mixed
     */
    public function sendEbOrdersPlacedAllEmail($ticketsInfo)
    {
        $cc = array(
            'president.aaulyp@gmail.com',
            'vicepresident.aaulyp@gmail.com',
            'secretary.aaulyp@gmail.com',
            'treasurer.aaulyp@gmail.com',
            'membership.aaulyp@gmail.com'
        );

        $response = Mail::send('pages.emails.ebOrdersPlacedAllEmail', ['ticketsInfo' => $ticketsInfo], function ($m) use ($ticketsInfo, $cc) {
            $m->from('pr.aaulyp@gmail.com', 'AAULYP Communications');
            $m->to('pr.aaulyp@gmail.com');
            $m->cc($cc);
            $m->subject($ticketsInfo['name'].' Order');
        });

        return $response;
    }
}