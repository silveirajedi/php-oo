<?php

namespace classes\Bank;

use classes\App\TriggerApp;
use classes\App\UserApp;

class AccountSaving extends Account
{
    private $interest;

    public function __construct($branch, $account, UserApp $client, $balance)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }

    public function deposit($value)
    {
        $this->balance = $value + ($value * $this->interest);
        TriggerApp::show("Depósito de {$this->toBrl($value)}, realizado com sucesso!", TriggerApp::SUCCESS);
    }

    public function withdrawal($value)
    {
        if ($this->balance >= $value) {
            $this->balance -= abs($value);
            TriggerApp::show("Saque de {$this->toBrl($value)}", TriggerApp::ERROR);
        } else {
            TriggerApp::show("Saldo insuficiente, você tem {$this->toBrl($this->balance)}", TriggerApp::WARNING);
        }
        
    }

}