<?php

namespace Tests\Unit;

use App\Classes\AccountClass;
use App\Http\Requests\EventRequest;
use App\Models\Account;
use App\Repository\AccountRepository;
use App\Services\AccountService;
use App\Services\EventService;
use PHPUnit\Framework\TestCase;

class EventsTest extends TestCase
{
    private $accountModel;
    private $accountRepository;
    private $accountService;

    private $eventService;

    public function __construct()
    {
        $this->accountModel = new Account();
        $this->accountRepository = new AccountRepository($this->accountModel);
        $this->accountService = new AccountService($this->accountRepository);

        $this->eventService = new EventService();
    }

    /** @test */
    public function create_new_account_with_initial_amount()
    {
        $eventRequest = new EventRequest([
            'type' => 'deposit',
            'destination' => 101,
            'amount' => 10,
        ]);

        $this->eventService->deposit($eventRequest);

        $account = $this->accountService->findAccount($eventRequest->destination);

        $this->assertEquals($account->getBalance(), 10);
    }

    /** @test */
    public function deposit_amount_in_account()
    {
        $eventRequest = new EventRequest([
            'type' => 'deposit',
            'destination' => 101,
            'amount' => 10,
        ]);

        $this->eventService->deposit($eventRequest);
        
        $account = $this->accountService->findAccount($eventRequest->destination);

        $this->assertEquals($account->getBalance(), 20);
    }

    /** @test */
    public function transfer_amount_of_non_exists_account()
    {
        $this->assertTrue(false);
    }

    /** @test */
    public function transfer_amount_of_exists_accounts()
    {
        $this->assertTrue(false);
    }
}
