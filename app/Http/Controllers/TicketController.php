<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreTicketRequest;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('category')->get();

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('tickets.create', compact('categories'));
    }

    public function store(StoreTicketRequest $request)
    {
        Ticket::create($request->validated());

        return redirect()->route('tickets.index');
    }
}
