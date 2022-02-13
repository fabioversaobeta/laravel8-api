<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalanceAccountRequest;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * Reset all data
     * 
     * @return \Illuminate\Http\Response
     */
    public function reset()
    {
        $this->accountService->reset();

        return response('', 200);
    }

    /**
     * Get Balance of user
     * 
     * @param  int  $account_id
     * @return \Illuminate\Http\Response
     */
    public function balance(BalanceAccountRequest $request)
    {
        $balance = $this->accountService->getBalance($request);

        if (!$balance) {
            return response(0, 404);
        }

        return response($balance, 200);
    }
}
