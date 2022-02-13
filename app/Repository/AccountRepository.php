<?php

namespace App\Repository;

use App\Models\Account;
use App\Classes\AccountClass;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountRepository {
    private $model;

    public function __construct(Account $account)
    {
        $this->model = $account;

        // parent::__construct((object) $this->accounts);
    }

    public function delete()
    {
        DB::delete('delete from accounts');
    }

    public function find($id)
    {
        $model = $this->model->find($id);

        if (!$model) {
            return false;
        }

        $account = new AccountClass();

        $account->setObject($model);

        return $account;
    }

    public function save($object)
    {
        $this->model->id = $object->getId();
        $this->model->balance = $object->getBalance();

        return $this->model->save();
    }

    // public function reset()
    // {
    //     DB::delete('delete from accounts');

    //     $model = new Account;
    //     $model->id = 100;
    //     $model->balance = 10;
    //     $model->save();

    //     $model = new Account;
    //     $model->id = 300;
    //     $model->balance = 0;
    //     $model->save();

    //     return true;
    // }

    /**
     * Get Balance of Account by account_id
     */
    // public function getBalance($account_id)
    // {
    //     $model = $this->model->find($account_id);

    //     $account = new Account();

    //     return $account->getBalance();
    // }

    /**
     * Create new account if not exists
     */
    // public function createAccount($account)
    // {
    //     $accounts = collect($this->accounts);

    //     $found_account = $accounts->firstWhere('account_id', $account->account_id);

    //     if ($found_account) {
    //         throw new Exception("Account has exists", 1);
    //     }

    //     $accounts->push($account);
    // }
}