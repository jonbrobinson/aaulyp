<?php

namespace App\Http\Controllers;

use App\Aaulyp\Tools\Api\EventbriteApi;
use App\Aaulyp\Tools\Api\GoogleMapsApi;
use App\Aaulyp\Services\Emailer;
use App\Aaulyp\Tools\Api\MailchimpApi;
use Illuminate\Http\Request;
use App\Http\Requests;

class WebhookController extends Controller
{
    protected $eventbrite;
    protected $emailer;
    protected $mailChimp;

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

        $orderUser['first_name'] = $orderUser['firstName'];
        $orderUser['last_name'] = $orderUser['lastName'];

        $newSubscriber = "unsubscribed";
        $updateStatus = null;

        if (EventbriteApi::EB_MEMBERSHIP_EVENT_ID == $orderUser["event_id"]) {
            $newSubscriber = "subscribed";
            $updateStatus = "subscribed";
        }

        $this->mailChimp->addMemberToList(MailchimpApi::MC_GENERAL_BODY_LIST_ID, $orderUser, $newSubscriber, $updateStatus);

        $ticketsInfo = $this->eventbrite->getTicketsInfo($orderUser["event_id"]);

        $event = $this->eventbrite->getGetEventById($orderUser["event_id"]);

        $ticketsInfo['name'] = $event['name']['text'];

        $response = $this->emailer->sendEbOrdersPlacedAllEmail($ticketsInfo);

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
        $this->eventbrite = new EventbriteApi(new GoogleMapsApi());
        $this->emailer = new Emailer();
        $this->mailChimp = new MailchimpApi();
    }
}
