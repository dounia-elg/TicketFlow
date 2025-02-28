<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('client.dashboard', compact('tickets'));
    }

    public function tickets()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('client.tickets', compact('tickets'));
    }

    public function createTicket(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:High,Medium,Low',
            'os' => 'required|string',
            'software' => 'required|string',
        ]);

        $ticket = new Ticket([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'os' => $request->os,
            'software' => $request->software,
            'user_id' => Auth::id(),
        ]);

        $ticket->save();

        return redirect()->route('client.tickets')->with('success', 'Ticket created successfully.');
    }
}