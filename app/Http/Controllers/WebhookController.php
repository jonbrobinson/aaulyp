<?php

namespace App\Http\Controllers;

use App\Aaulyp\Tools\Api\Eventbrite;
use app\Aaulyp\Services\Emailer;
use Illuminate\Http\Request;

use App\Http\Requests;

class WebhookController extends Controller
{
    protected $eventbrite;
    protected $emailer;

    public function ebOrders(Request $request)
    {
        $this->init();

        $orderUrl = $request->input('api_url');

        $orderUser = $this->eventbrite->getOrderPlaced($orderUrl);

        return response($orderUser);

//        $response = $this->emailer->sendWelcomeEmail($orderUser);
//
//        if ($response->getStatusCode() == 200) {
//            return response()->json([
//                "message" => "Success. Welcome email has been sent"
//
//            ], $response->getStatusCode());
//        }
//
//        return response($response->getBody(), $response->getStatusCode());

    }

    protected function init()
    {
        $this->eventbrite = new Eventbrite();
        $this->emailer = new Emailer();
    }
}
