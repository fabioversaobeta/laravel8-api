<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Classes\Account;

class AccountClassTest extends TestCase
{
    public function verify_account_id_of_account()
    {
        $account = new Account(["account_id" => 1234, "balance" => 0]);

        $this->assertEquals($account->getId(), 1234);
    }

    /** @test */
    public function verify_balance_in_account()
    {
        $account = new Account(["account_id" => 100, "balance" => 200]);

        $this->assertEquals($account->getBalance(), 200);
    }

    /** @test  */
    public function deposit_amount_in_account()
    {
        $account = new Account(["account_id" => 100, "balance" => 0]);

        $account->deposit(10);

        $this->assertEquals($account->getBalance(), 10);
    }

    /** @test */
    public function withdraw_amount_of_account()
    {
        $account = new Account(["account_id" => 100, "balance" => 500]);

        $account->withdraw(500);

        $this->assertEquals($account->getBalance(), 0);
    }
}
