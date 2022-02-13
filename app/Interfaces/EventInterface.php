<?php

namespace App\Interfaces;

use App\Http\Requests\EventRequest;

interface EventInterface
{
    public function deposit(EventRequest $request);
    public function withdraw(int $origin, float $amount);
    public function transfer(int $origin, float $amount, int $destination);
}