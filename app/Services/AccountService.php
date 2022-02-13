<?php

namespace App\Services;

use App\Interfaces\AccountInterface;
use App\Models\Events;
use App\Repository\AccountRepository;
use App\Classes\AccountClass;
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
    }
    
    public function getBalance(Request $request)
    {
        $account_id = $request->account_id;

        if (!is_numeric($account_id)) {
            return false;
        }

        // TODO find account

        // TODO return account balance

        $account = $this->accountRepository->find($account_id);

        if (!$account) {
            return false;
        }

        return $account->getBalance();
    }

    public function createAccount(Request $request)
    {
        $type = $request->type;
        $destination = $request->destination;
        $amount = $request->amount;

        if ($type != 'deposit') {
            return false;
        }

        $account = new AccountClass();

        $model = new Account();
        $model->id = $destination;
        $model->balance = $amount;

        $account->setObject($model);

        $this->accountRepository->save($account);

        return $account;
    }

    public function findAccount($account_id)
    {
        return $this->accountRepository->find($account_id);
    }
     
}