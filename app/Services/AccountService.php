<?php

namespace App\Services;

use App\Interfaces\AccountInterface;
use App\Models\Events;

class AccountService implements AccountInterface {

    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function reset()
    {
        $accountRepository->reset();
    }
    
    public function getBalance(Request $request)
    {
        $account_id = $request;

        if (!is_numeric($account_id)) {
            return false;
        }

        // TODO find account

        // TODO return account balance

        $this->accountRepository->getBalance($account_id);
    }

    public function createAccount(Request $request)
    {
        // TODO implement create account
    }
     
}