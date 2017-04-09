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

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function ebOrdersPlacedAll(Request $request)
    {
        $this->init();

        $orderUrl = $request->input('api_url');

        $orderUser = $this->eventbrite->getOrderPlaced($orderUrl);

        $ticketInfo = $this->eventbrite->getTicketsInfo($orderUser["event_id"]);

        $response = $this->emailer->sendOrdersPlacedAllEmail($ticketInfo);

        return $this->getTicketResponseStatus($response);
    }

    /**
     * @param $response
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function getTicketResponseStatus($response)
    {
        if ($response->getStatusCode() == 200) {
            return response()->json([
                "message" => "Success. Ticket Update email has been sent"

            ], $response->getStatusCode());
        }

        return response($response->getBody(), $response->getStatusCode());
    }

    /**
     *
     */
    protected function init()
    {
        $this->eventbrite = new EventbriteApi();
        $this->emailer = new Emailer();
    }
}
