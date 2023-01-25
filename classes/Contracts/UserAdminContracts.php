<?php

namespace Classes\Contracts;

class UserAdminContracts extends UserContracts implements UserInteface, UserErrorInterface
{
    private $level;
    private $error;

    public function __construct($firstName, $lastName, $email)
    {
        parent::__construct($firstName, $lastName, $email);
        $this->level = 10;
    }

    public function setError($error): void
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }


}