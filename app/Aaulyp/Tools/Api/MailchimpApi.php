<?php

namespace App\Aaulyp\Tools\Api;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;

class MailchimpApi
{
    const MAILCHIMP_BASE_URL = "https://us4.api.mailchimp.com/3.0";
    const MC_GENERAL_BODY_LIST_ID = "17d8d9f32d";
    const MC_YP_WEEKEND_LIST_ID = "";

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
     * @param int   $listId
     * @param array $member
     */
    public function addMemberToList($listId, $member)
    {

    }

    protected function createMailchimpListMember($user)
    {
        $member['merge_fields']['FNAME'] = $user['first_name'];
        $member['merge_fields']['LNAME'] = $user['last_name'];

        return $member;
    }
}