<?php

namespace App\Services;

use App\Interfaces\AccountInterface;
use App\Models\Events;
use App\Repository\AccountRepository;
use App\Classes\Account;
use Illuminate\Http\Request;

class AccountService implements AccountInterface {

    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function reset()
    {
        // $accountRepository->reset();
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
        $type = $request->type;
        $destination = $request->destination;
        $amount = $request->amount;

        if ($type != 'deposit') {
            throw 'Not is possible create account';
        }

        $account = new Account([
            "account_id" => $destination,
            "balance" => $amount
        ]);

        return $this->accountRepository->save($account);
    }
     
}