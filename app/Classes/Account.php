<?php

namespace App\Classes;

class Account {
    private $account_id;
    private $balance;

    public function __construct($array)
    {
        $this->account_id = $array['account_id'];
        $this->balance = $array['balance'];
    }

    public function getId()
    {
        return $this->account_id;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        $this->balance = $this->balance + $amount;
    }

    public function withdraw($amount)
    {
        $this->balance = $this->balance - $amount;
    }
}