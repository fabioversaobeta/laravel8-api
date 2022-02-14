<?php

namespace App\Services;

use App\Interfaces\AccountInterface;
use App\Models\Events;
use App\Repository\AccountRepository;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountService implements AccountInterface {

    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function reset()
    {
        $this->accountRepository->delete();

        $this->accountRepository->save(100, 10);

        $this->accountRepository->save(300, 0);
    }
    
    public function getBalance($account_id)
    {
        if (!is_numeric($account_id)) {
            return false;
        }

        $account = $this->accountRepository->find($account_id);

        if (!$account) {
            return false;
        }

        return round($account->balance);
    }

    public function createAccount($account_id, $amount)
    {
        $account = $this->accountRepository->find($account_id);

        if ($account) {
            return $account;
        }

        if($this->accountRepository->save($account_id, $amount)) {
            return $this->accountRepository->find($account_id);
        }

        return false;
    }

    public function findAccount($account_id)
    {
        return $this->accountRepository->find($account_id);
    }
     
}