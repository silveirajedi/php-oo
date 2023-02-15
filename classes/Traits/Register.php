<?php

namespace Classes\Traits;

class Register
{
    use UserTrait;
    use AddressTrait;

    public function __construct(User $user, Address $address)
    {
        $this->setUser($user);
        $this->setAdreess($address);
        $this->save();
    }

    private function save(){
        $this->user->id = 232;
        $this->adreess->user_id = $this->user->id;
    }

}