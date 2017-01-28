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
    public function ebOrders(Request $request)
    {
        $this->init();

        $orderUrl = $request->input('api_url');

        $orderUser = $this->eventbrite->getOrderPlaced($orderUrl);

        $response = $this->emailer->sendWelcomeEmail($orderUser);

        return $this->getTicketResponseStatus($response);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function ypWeekendOrders(Request $request)
    {
        $this->init();

        $ticketsInfo = $this->eventbrite->getYpWeekendTicketInfo();

        $response = $this->emailer->sendYpWeekendOrdersEmail($ticketsInfo);

        return $this->getTicketResponseStatus($response);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function joinWeekMixerOrders(Request $request)
    {
        $this->init();

        $ticketsInfo = $this->eventbrite->getJoinWeekTicketsInfo();

        $response = $this->emailer->sendJoinWeekMixerOrdersEmail($ticketsInfo);

        return $this->getTicketResponseStatus($response);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function membership2017Orders(Request $request)
    {
        $this->init();

        $ticketsInfo = $this->eventbrite->getMembership2017TicketsInfo();

        $response = $this->emailer->sendMembership2017Email($ticketsInfo);

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
