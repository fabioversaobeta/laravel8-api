<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\BalanceAccountRequest;
use App\Http\Requests\CreateAccountRequest;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAccountRequest $request)
    {
        $createdAccount = $this->accountService->createaAccount($request);

        if (!$createdAccount) {
            return response('fail', 500);
        }

        return response()->json($createdAccount);
    }

    /**
     * Reset all data
     * 
     * @return \Illuminate\Http\Response
     */
    public function reset()
    {
        //
        return response('OK', 200);
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

        return response($balance, 200);
    }
}
