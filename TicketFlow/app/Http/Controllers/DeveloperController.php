<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('assigned_to', Auth::id())->get();
        return view('developer.dashboard', compact('tickets'));
    }

    public function updateTicket(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'status' => 'required|in:Open,In Progress,Resolved,Closed',
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        $ticket->status = $request->status;
        $ticket->save();

        return redirect()->route('developer.dashboard')->with('success', 'Ticket status updated successfully.');
    }
}