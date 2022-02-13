<?php

namespace App\Classes;

use App\Models\Account;

class AccountClass {
    private $account_id;
    private $balance;

    public function __construct()
    {
        
    }

    public function getId()
    {
        return $this->account_id;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getObject()
    {
        $account = new Account();

        $account->id = $this->account_id;
        $account->balance = $this->balance;

        return $account;
    }

    public function setObject(Account $model)
    {
        $this->account_id = $model->id;
        $this->balance = $model->balance;
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