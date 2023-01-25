<?php

namespace Classes\Bank;

use Classes\App\TriggerApp;
use Classes\App\UserApp;

abstract class Account
{
    protected $branch;
    protected $account;
    protected $client;
    protected $balance;

    /**
     * @param $branch
     * @param $account
     * @param $client
     * @param $balance
     */
    protected function __construct($branch, $account, UserApp $client, $balance)
    {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }

    public function extract()
    {
        $extract = ($this->balance >= 1 ? TriggerApp::SUCCESS : TriggerApp::ERROR);
        TriggerApp::show("EXTRATO: Saldo atual: {$this->toBrl($this->balance)}", $extract);
    }

    protected function toBrl($value)
    {
        return "R$ " . number_format($value, "2", ",", ".");
    }

    abstract public function deposit($value);

    abstract public function withdrawal($value);
}