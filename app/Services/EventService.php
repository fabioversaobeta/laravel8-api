<?php

namespace App\Services;

use App\Interfaces\EventInterface;
use App\Models\Events;
use App\Repository\AccountRepository;
use App\Classes\AccountClass;
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
            $account = $this->accountService->createAccount($request);
        }

        $account->deposit($request->amount);

        $model = $account->getObject();
        $model->save();

        return [
            "destination" => $account->getReturn()
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