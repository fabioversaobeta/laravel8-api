<?php

use Illuminate\Support\Collection;
use App\Repository\BaseRepository;

namespace App\Repositories;

class AccountRepository extends BaseRepository {
    protected $accounts;

    public function __construct(collection $accounts)
    {
        parent::__construct($accounts);
    }


    private $accounts2 = [
        0 => [
            "account_id" => 100,
            "balance" => 20
        ],
        1 => [
            "account_id" => 300,
            "balance" => 20
        ]
    ];

    public function reset()
    {
        $accounts = [
            0 => [
                "account_id" => 100,
                "balance" => 20
            ],
            1 => [
                "account_id" => 300,
                "balance" => 20
            ]
        ];

        $this->accounts = accounts;
    }

    /**
     * Get Balance of Account by account_id
     */
    public function getBalance($account_id)
    {
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