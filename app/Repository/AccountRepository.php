<?php

use App\Repository\BaseRepository;
use Illuminate\Http\Request;

namespace App\Repository;

use Exception;
use Illuminate\Http\Request;

class AccountRepository extends BaseRepository {
    protected $accounts = [
        0 => [
            "account_id" => 100,
            "balance" => 20
        ],
        1 => [
            "account_id" => 300,
            "balance" => 20
        ]
    ];

    public function __construct()
    {
        parent::__construct((object) $this->accounts);
    }

    public function reset()
    {
        // TODO code here
    }

    /**
     * Get Balance of Account by account_id
     */
    public function getBalance(Request $request)
    {
        $account_id = $request->account_id;

        $accounts = collect($this->accounts);

        $account = $accounts->firstWhere('account_id', $account_id);

        return $account->balance;
    }

    /**
     * Create new account if not exists
     */
    public function createAccount($account)
    {
        $accounts = collect($this->accounts);

        $found_account = $accounts->firstWhere('account_id', $account->account_id);

        if ($found_account) {
            throw new Exception("Account has exists", 1);
        }

        $accounts->push($account);
    }
}