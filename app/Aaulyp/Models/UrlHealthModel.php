<?php
namespace App\Aaulyp\Models;

/**
 * Class HealthCheckError
 */
class UrlHealthModel
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $code;

    /**
     * var string
     */
    protected $message;

    /**
     * @var object
     */
    protected $meta;

    /**
     * @var bool
     */
    protected $error = false;

    /**
     * @return string
     */
    public function getUrl(){
        return $this->url;
    }

    /**
     * @return int
     */
    public function getCode(){
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage(){
        return $this->message;
    }

    /**
     * @return object
     */
    public function getMeta(){
        return $this->meta;
    }

    /**
     * @return bool
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $url
     */
    public function setUrl($url){
        $this->url = $url;
    }

    /**
     * @param int $code
     */
    public function setCode($code){
        $this->code = $code;
    }

    /**
     * @param string $message
     */
    public function setMessage($message){
        $this->message = $message;
    }

    /**
     * @param mixed $bool
     */
    public function setError($bool)
    {
        $this->error = filter_var($bool, FILTER_VALIDATE_BOOLEAN);
    }
}