<?php

namespace Classes\Inheritance\Event;

use Classes\Inheritance\AddressEvent;

class EventLive extends Event
{
    /**
     * @var AddressEvent
     */
    private $address;

    public function __construct($event, \DateTime $date, $price, $vacancies, AddressEvent $address)
    {
        parent::__construct($event, $date, $price, $vacancies);
        $this->address = $address;
    }

    /**
     * @return AddressEvent
     */
    public function getAddress(): AddressEvent
    {
        return $this->address;
    }

}