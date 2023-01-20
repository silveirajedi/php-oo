<?php

namespace classes\Bank;

use classes\App\TriggerApp;
use classes\App\UserApp;

class AccountCurrent extends Account
{
    private $limit;

    public function __construct($branch, $account, UserApp $client, $balance, $limit)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
    }

    final public function deposit($value)
    {
        $this->balance += $value;
        TriggerApp::show("Depósito de {$this->toBrl($value)}, realizado com sucesso!", TriggerApp::SUCCESS);
    }

    final public function withdrawal($value)
    {
        if ($value <= $this->balance + $this->limit) {
            $this->balance -= abs($value);
            TriggerApp::show("Saque de {$this->toBrl($value)} efetuado com sucesso!", TriggerApp::ERROR);

            if ($this->balance < 0) {
                $tax = abs($this->balance) * 0.006;
                $this->balance -= $tax;
                TriggerApp::show("Taxa de uso de limite: {$this->toBrl($tax)}", TriggerApp::WARNING);
            }

        } else {
            $saving = $this->balance + $this->limit;
            TriggerApp::show("Saldo insuficiente, você tem: {$this->toBrl($saving)}", TriggerApp::ERROR);
        }


    }

}