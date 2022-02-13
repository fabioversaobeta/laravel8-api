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
                $this->deposit($request);
                break;

            case 'withdraw':
                $this->withdraw($request);
                break;    
            
            case 'transfer':
                $this->transfer($request);
                break;          
    
            default:
                return response('', 404);
                break;
        }
    }

    private function deposit(EventRequest $request)
    {
        // TODO implement
        $destination = $request->destination;
        $amount = $request->amount;

        $return = $this->eventService->deposit($destination, $amount);

        return response($return, 200);
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
