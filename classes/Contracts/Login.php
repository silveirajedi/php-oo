<?php

namespace Classes\Contracts;

class Login
{
    private $logged;

    /**
     * @param UserContracts $user
     * @return UserContracts
     */
    public function loginUser(UserContracts $user): UserContracts
    {
        $this->logged = $user;
        return $this->logged;
    }

    /**
     * @param UserAdminContracts $user
     * @return UserAdminContracts
     */
    public function loginAdmin(UserAdminContracts $user): UserAdminContracts
    {
        $this->logged = $user;
        return $this->logged;
    }

    public function login(UserInteface $user): UserInteface
    {
        $this->logged = $user;
        return $this->logged;
    }

}