<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 5/19/18
 * Time: 12:47 AM
 */

namespace App\Aaulyp\Services;

use App\Aaulyp\Models\UrlHealthModel;
use App\Aaulyp\Tools\Api\ApiBaseHelper;
use Exception;

class HealthChecker extends ApiBaseHelper
{
    protected $errors = [];

    public function getErrors(){
        return $this->errors;
    }

    public function runGenSiteCheck() {
        $urls = ['//aaulyp.org', url('//aaulyp.org/events'), url('//aaulyp.org/join')];
        $sendErrorEmail = false;
        foreach($urls as $url) {
            $Status = $this->getUrlStatus($url);

            if ($Status->getError()) {
                $this->addError($Status);
                $sendErrorEmail = true;
            }
        }

        if ($sendErrorEmail) {
            $errors = $this->getErrors();
            $emailer = new Emailer();
            $emailer->sendHealthCheckEmail($errors);
        }
    }

    protected function getUrlStatus($url){
        try {
            $response = $this->guzzle->request('GET', $url); /* @var $response \GuzzleHttp\Psr7\Response */
        } catch (Exception $e) {
            $errorCode = $e->getCode();
            $errorMessage = $e->getMessage();
            return $this->createErrorStatus($url, $errorCode, $errorMessage);
        }

        $code = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        if ($code !== 200){
            return $this->createErrorStatus($url, $code, $body);
        }

        return $this->createSuccessStatus($url, $code, "Looks Good");
    }

    /**
     * @param object $error
     */
    protected function addError($error)
    {
        $this->errors[] = $error;
    }

    /**
     * @param string $url
     * @param int    $code
     * @param string $message
     *
     * @return UrlHealthModel
     */
    protected function createSuccessStatus($url, $code, $message){
        return $this->createUrlStatus($url, $code, $message, false);
    }

    /**
     * @param string $url
     * @param int    $code
     * @param string $message
     *
     * @return UrlHealthModel
     */
    protected function createErrorStatus($url, $code, $message){
        return $this->createUrlStatus($url, $code, $message, true);
    }

    /**
     * @param string $url
     * @param int    $code
     * @param string $message
     * @param bool   $error
     *
     * @return UrlHealthModel
     */
    protected function createUrlStatus($url, $code, $message, $error){
        $Status  = new UrlHealthModel();
        $Status->setCode($code);
        $Status->setUrl($url);
        $Status->setMessage($message);
        $Status->setError($error);

        return $Status;
    }
}