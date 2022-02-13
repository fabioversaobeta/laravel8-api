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
        if ($request->type == 'deposit') {
            $this->deposit($request);
        }

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
                return response('', 404);
                break;
        }

        return response($return, 200);
    }

    private function deposit(EventRequest $request)
    {
        return $this->eventService->deposit($request);
    }

    private function withdraw(EventRequest $request)
    {
        // TODO implement
        return response('withdraw', 200);
    }

    private function transfer(EventRequest $request)
    {
        // TODO implement
        return response('transfer', 200);
    }
}
