<?php

namespace App\Repository;

use App\Models\Account;
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
        return $this->model->select(['id', 'balance'])->find($id);
    }

    public function save($account_id, $amount)
    {
        $model = new Account;

        $model->id = $account_id;
        $model->balance = $amount;

        return $model->save();
    }

    public function update($account)
    {
        $model = Account::find($account->id);

        $model->balance = $account->balance;

        return $model->update();
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