<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function store(StoreTicketRequest $request)
    {
        return Ticket::create($request->validated());
    }

}
