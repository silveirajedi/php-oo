<?php

namespace Classes\Traits;

class User
{
    private $fistName;
    private $lastName;
    private $email;

    /**
     * @param $fistName
     * @param $lastName
     * @param $email
     */
    public function __construct($fistName, $lastName, $email)
    {
        $this->fistName = $fistName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFistName()
    {
        return $this->fistName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }




}