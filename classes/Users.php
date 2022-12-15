<?php

namespace classes;

/**
 *
 */

class Users
{
    public $firstName;
    public $lastName;
    private $email;

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstName = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastName = filter_var($lastname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @param $email
     * @return bool
     */
    public function setEmail($email): bool
    {
        $this->email = $email;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            return false;
        }
    }


}