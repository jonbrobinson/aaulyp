<?php
namespace App\Aaulyp\Models;

/**
 * Class AttendeeModel
 */
class AttendeeModel
{
    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $eventName;

    /**
     * @var string
     */
    public $eventDate;

    /**
     * @var bool
     */
    public $addToMailList = false;

    /**
     * @var bool
     */
    public $firstEvent = false;

    /**
     * @var int
     */
    public $dateTimeAdded;

    /*
     * @var int
     */
    public $lastModifiedTimestamp;

    /**
     * @return string
     */
    public function getFullName()
    {
        $firstName = trim($this->firstName);

        $lastName = trim($this->lastName);

        $fullName = trim($firstName." ".$lastName);

        return $fullName;
    }

}