<?php

namespace Tests\Unit;

use App\Models\Account;
use App\Repository\AccountRepository;
use App\Services\AccountService;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    private $accountModel;
    private $accountRepository;
    private $accountService;

    public function __construct()
    {
        $this->accountModel = new Account();
        $this->accountRepository = new AccountRepository($this->accountModel);
        $this->accountService = new AccountService($this->accountRepository);
    }
    /** @test */
    public function create_new_account()
    {
        $this->accountService->reset();

        $createdAccount = $this->accountService->createAccount(12345, 0) ? true : false;

        $this->assertTrue($createdAccount);
    }

    /** @test */
    public function get_balance_account()
    {
        $this->accountService->reset();

        $balance = $this->accountService->getBalance(100);

        $this->assertEquals($balance, 10);
    }
}
