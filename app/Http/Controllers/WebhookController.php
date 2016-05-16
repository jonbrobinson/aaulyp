<?php

namespace App\Http\Controllers;

use App\Aaulyp\Tools\Api\Eventbrite;
use App\Aaulyp\Services\Emailer;
use Illuminate\Http\Request;
use App\Http\Requests;

class WebhookController extends Controller
{
    protected $eventbrite;
    protected $emailer;

    public function __construct()
    {
        parent::__construct();

        $this->eventbrite = new Eventbrite();
        $this->emailer = new Emailer();
    }

    public function ebOrders(Request $request)
    {

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
}
