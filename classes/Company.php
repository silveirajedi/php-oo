<?php

namespace classes;

class Company
{
    private $company;

    /**
     * @var CompanyAddress
     */
    private $address;
    private $team;
    private $products;

    public function bootCompany($company, $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    public function boot($company, CompanyAddress $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    public function addProduct(CompanyProduct $product)
    {
        $this->products[] = $product;
    }

    public function addTeamMember($job, $firtName, $lastName)
    {
        $this->team[] = new CompanyUser($job, $firtName, $lastName);
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }



}