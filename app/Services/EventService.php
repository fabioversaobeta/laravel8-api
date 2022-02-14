<?php

namespace App\Services;

use App\Classes\AccountClass;
use App\Interfaces\EventInterface;
use App\Models\Events;
use App\Repository\AccountRepository;
use App\Models\Account;
use Illuminate\Http\Request;

class EventService implements EventInterface {
    private $accountModel;
    private $accountRepository;
    private $accountService;

    public function __construct()
    {
        $this->accountModel = new Account();
        $this->accountRepository = new AccountRepository($this->accountModel);
        $this->accountService = new AccountService($this->accountRepository);
    }

    public function deposit($request)
    {
        $account = $this->accountRepository->find($request->destination);

        if (!$account) {
            $account = $this->accountService->createAccount($request->destination, 0);
        }

        if (!$account) {
            return false;
        }

        $account->balance += $request->amount;

        $this->accountRepository->update($account);

        $accountClass = new AccountClass($account);

        return [
            "destination" => $accountClass->getResponse()
        ];
    }    
    
    public function withdraw($origin, $amount)
    {
        // TODO implement
    }

    public function transfer($origen, $amount, $destination)
    {
        // TODO implement
    }
}