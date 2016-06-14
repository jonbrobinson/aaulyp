<?php

namespace App\Http\Controllers;

use App\Aaulyp\Tools\Api\EventbriteApi;
use App\Aaulyp\Services\Emailer;
use Illuminate\Http\Request;
use App\Http\Requests;

class WebhookController extends Controller
{
    protected $eventbrite;
    protected $emailer;

    public function init()
    {
        $this->eventbrite = new EventbriteApi();
        $this->emailer = new Emailer();
    }

    public function ebOrders(Request $request)
    {
        $this->init();

        $orderUrl = $request->input('api_url');

        $orderUser = $this->eventbrite->getOrderPlaced($orderUrl);

        $response = $this->emailer->sendWelcomeEmail($orderUser);

        if ($response->getStatusCode() == 200) {
            return response()->json([
                "message" => "Success. Welcome email has been sent"

            ], $response->getStatusCode());
        }

        return response($response->getBody(), $response->getStatusCode());
    }

    public function ypWeekendOrders(Request $request)
    {
        $this->init();

        $orderUrl = $request->input('api_url');

        $orderUser = $this->eventbrite->getOrderPlaced($orderUrl);

        $ticketsInfo = $this->eventbrite->getYpWeekendTicketInfo();

        $response = $this->emailer->sendYpWeekendOrdersEmail($orderUser, $ticketsInfo);

        if ($response->getStatusCode() == 200) {
            return response()->json([
                "message" => "Success. Ticket Update email has been sent"

            ], $response->getStatusCode());
        }

        return response($response->getBody(), $response->getStatusCode());
    }
}
