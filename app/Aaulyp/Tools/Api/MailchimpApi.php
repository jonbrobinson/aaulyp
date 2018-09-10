<?php

namespace App\Aaulyp\Tools\Api;

use App\Aaulyp\Models\AttendeeModel;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class MailchimpApi
{
    const MAILCHIMP_BASE_URL = "https://us4.api.mailchimp.com/3.0";
    const MC_GENERAL_BODY_LIST_ID = "17d8d9f32d";
    const MC_TEST_LIST = "f8ae11f203";

    protected $validMemberKeys = ['first_name', 'last_name', 'email'];
    protected $guzzle;
    protected $stack;

    public function __construct()
    {
        $handler = new CurlHandler();
        $this->stack = HandlerStack::create($handler); // Wrap w/ middleware
        $this->guzzle = new Guzzle([
            // Base URI is used with relative requests
            'base_uri' => self::MAILCHIMP_BASE_URL
        ]);
    }

    /**
     * Gets all members with of a list with status "subscribed"
     *
     * @param string $listId mailchimp list id
     *
     * @return array
     */
    public function getListSubscribers($listId = self::MC_GENERAL_BODY_LIST_ID)
    {
        $listInfo = $this->getListMembers($listId);

        $subscribers = [];
        foreach ($listInfo->members as $key => $member) {
            if ($member->status !== "subscribed") {
                continue;
            }

            $sub = [];
            $sub['firstName'] = $member->merge_fields->FNAME;
            $sub['lastName'] = $member->merge_fields->LNAME;
            $sub['email'] = $member->email_address;
            $subscribers[] = $sub;
        }

        return $subscribers;
    }

    /**
     * Gets all members of a list regardless of status
     *
     * @param string $listId mailchimp list id
     *
     * @return array
     */
    public function getListMembers($listId = self::MC_GENERAL_BODY_LIST_ID)
    {
        $info = $this->getListMemberInfo($listId);

        $listInfo = $this->getListMemberInfo($listId, $info->total_items);

        return $listInfo;
    }

    /**
     * Get the member info of a list Is
     *
     * @param string $listId mailchimp list id
     * @param int    $count  limit of members to return
     *
     * @return mixed
     */
    public function getListMemberInfo($listId, $count = 10)
    {
        $url = self::MAILCHIMP_BASE_URL . "/lists/" . $listId . "/members";
        $headers = [
            'anything',
            env('MAILCHIMP_TOKEN'),
        ];

        $options = [
            'auth' => $headers,
            'handler' => $this->stack,
            'query' => ['count' => $count]
        ];

        $response = $this->guzzle->request('GET', $url, $options);

        $subscribersJson = json_decode($response->getBody()->getContents());

        return $subscribersJson;
    }

    /**
     * Add member to list based on ID
     *
     * @param array  $member
     * @param string $updateStatus
     * @param string $newStatus
     *
     * @return Response
     * @throws \Exception
     */
    public function updateMemberGeneralMailingList($member, $updateStatus = "subscribed", $newStatus = "subscribed")
    {
        $url = self::MAILCHIMP_BASE_URL."/lists/".self::MC_GENERAL_BODY_LIST_ID."/members/".md5($member["email"]);

        $options = $this->buildMemberOptions($member, $updateStatus, $newStatus);

        $response = $this->guzzle->request('PUT', $url, $options);

        if ($response->getStatusCode() != 200) {

            return false;
        }

        return $response->getBody()->getContents();
    }

    /**
     * Add member to list based on ID
     *
     * @param int    $listId
     * @param array  $member
     * @param string $updateStatus
     * @param string $newStatus
     *
     * @return Response
     * @throws \Exception
     */
    public function addMemberToList($listId, $member, $newStatus = "unsubscribed", $updateStatus = null)
    {
        $url = self::MAILCHIMP_BASE_URL."/lists/".$listId."/members/".md5($member["email"]);

        $options = $this->buildMemberOptions($member,$newStatus, $updateStatus);

        $response = $this->guzzle->request('PUT', $url, $options);

        if ($response->getStatusCode() != 200) {

            return false;
        }

        return $response->getBody()->getContents();
    }

    /**
     * Add member to list based on ID
     *
     * @param int            $listId
     * @param AttendeeModel  $attendee
     * @param string         $updateStatus
     * @param string         $newStatus
     *
     * @return Response
     * @throws \Exception
     */
    public function addAttendeeToList($listId, $attendee, $newStatus = "unsubscribed", $updateStatus = null)
    {
        $url = self::MAILCHIMP_BASE_URL."/lists/".$listId."/members/".md5($attendee->email);

        $options = $this->buildAttendeeOptions($attendee,$newStatus, $updateStatus);

        $response = $this->guzzle->request('PUT', $url, $options);

        if ($response->getStatusCode() != 200) {

            return false;
        }

        return $response->getBody()->getContents();
    }


    /**
     * @param array $member
     * @param string        $newStatus
     * @param null          $updateStatus
     *
     * @return array
     */
    protected function buildMemberOptions($member, $newStatus = "unsubscribed", $updateStatus = null)
    {
        $headers = [
            'aaulyp',
            env('MAILCHIMP_TOKEN'),
        ];

        $options = [
            'auth' => $headers,
            'handler' => $this->stack,
            'json' => [
                "email_address" => $member['email'],
                "status_if_new" => $newStatus,
                "merge_fields" => [
                    'FNAME' => $member["first_name"],
                    'LNAME' => $member["last_name"],
                ],
            ]
        ];

        if ($updateStatus) {
            $options["json"]["status"] = $updateStatus;
        }

        return $options;
    }

    /**
     * @param AttendeeModel $attendee
     * @param string        $newStatus
     * @param null          $updateStatus
     *
     * @return array
     */
    protected function buildAttendeeOptions($attendee, $newStatus = "unsubscribed", $updateStatus = null)
    {
        $headers = [
            'aaulyp',
            env('MAILCHIMP_TOKEN'),
        ];

        $options = [
            'auth' => $headers,
            'handler' => $this->stack,
            'json' => [
                "email_address" => $attendee->email,
                "status_if_new" => $newStatus,
                "merge_fields" => [
                    'FNAME' => $attendee->firstName,
                    'LNAME' => $attendee->lastName,
                ],
            ]
        ];

        if ($updateStatus) {
            $options["json"]["status"] = $updateStatus;
        }

        return $options;
    }
}