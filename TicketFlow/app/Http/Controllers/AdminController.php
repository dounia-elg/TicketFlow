<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.dashboard', compact('tickets'));
    }

    public function tickets()
    {
        $tickets = Ticket::all();
        return view('admin.tickets', compact('tickets'));
    }

    public function assignTicket(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'developer_id' => 'required|exists:users,id',
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        $ticket->assigned_to = $request->developer_id;
        $ticket->save();

        return redirect()->route('admin.tickets')->with('success', 'Ticket assigned successfully.');
    }
}