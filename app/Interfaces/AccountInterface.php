<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AccountInterface
{
    public function reset();
    public function getBalance(Request $request);
    public function createAccount(Request $request);
    public function findAccount(int $account_id);
}