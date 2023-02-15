<?php

namespace Classes\Traits;

trait AddressTrait
{
    private $adreess;

    /**
     * @return Address
     */
    public function getAdreess(): Address
    {
        return $this->adreess;
    }

    /**
     * @param mixed $adreess
     */
    public function setAdreess(Address $adreess): void
    {
        $this->adreess = $adreess;
    }


}