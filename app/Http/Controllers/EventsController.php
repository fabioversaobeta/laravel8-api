<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventDepositRequest;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventTransferRequest;
use App\Http\Requests\EventWithdrawRequest;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $eventService;
    
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * Events of Accounts
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function event(EventRequest $request)
    {
        switch ($request->type) {
            case 'deposit':
                $return = $this->deposit($request);
                break;

            case 'withdraw':
                $return = $this->withdraw($request);
                break;    
            
            case 'transfer':
                $return = $this->transfer($request);
                break;          
    
            default:
                $return = false;
                break;
        }

        if (!$return) {
            return response(0, 404);
        }

        return response($return, 200);
    }

    private function deposit(EventRequest $request)
    {
        return $this->eventService->deposit($request);
    }

    private function withdraw(EventRequest $request)
    {
        return $this->eventService->withdraw($request);
    }

    private function transfer(EventRequest $request)
    {
        return $this->eventService->transfer($request);
    }
}
