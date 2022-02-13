<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\EventsController;

Route::post('reset', [AccountsController::class, 'reset']);
Route::post('event', [EventsController::class, 'store']);
Route::get('balance/{account_id?}', [AccountsController::class, 'balance']);