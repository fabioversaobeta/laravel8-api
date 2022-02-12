<?php

interface AccountInterface
{
    public function reset();
    public function getBalance(int $account_id);
    public function createAccount(Events $event);
}