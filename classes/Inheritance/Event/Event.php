<?php

namespace classes\Inheritance\Event;

class Event
{
    private $event;
    private $date;
    private $price;

    private $register;
    protected $vacancies;

    /**
     * @param $event
     * @param $date
     * @param $price
     * @param $vacancies
     */
    public function __construct($event, \DateTime $date, $price, $vacancies)
    {
        $this->event = $event;
        $this->date = $date;
        $this->price = $price;
        $this->vacancies = $vacancies;
    }

    public function register($fullName, $email)
    {
        if ($this->vacancies >= 1 ) {
            $this->vacancies -= 1;
            $this->setRegister($fullName, $email);
            echo "<p class='trigger success'>{$fullName}, Sua vaga está registrada e garantida</p>";
        } else {
            echo "<p class='trigger error'>Desculpe {$fullName} mas as vagas já se esgotaram</p>";
        }

    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date->format("d/m/Y H:i");
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return number_format($this->price, "2", ",", ".");
    }

    /**
     * @return mixed
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @return mixed
     */
    public function getVacancies()
    {
        return $this->vacancies;
    }


    /**
     * @param $fullName
     * @param $email
     * @return void
     */
    protected function setRegister($fullName, $email): void
    {
        $this->register = [
            "name" => $fullName,
            "email" => $email
        ];
    }


}