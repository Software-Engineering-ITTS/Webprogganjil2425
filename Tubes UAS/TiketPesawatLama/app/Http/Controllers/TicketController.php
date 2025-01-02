<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    public function index()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please log in first');
        }

        $tickets = Ticket::all();
        return view('admin.index', compact('tickets'));
    }

    public function create()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please log in first');
        }

        return view('admin.create');
    }

    public function store(Request $request)
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please log in first');
        }

        $request->validate([
            'maskapai' => 'required',
            'departur' => 'required',
            'destinasi' => 'required',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Ticket::create([
            'maskapai' => $request->maskapai,
            'departur' => $request->departur,
            'destinasi' => $request->destinasi,
            'harga' => $request->harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Ticket created successfully!');
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('admin.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'maskapai' => 'required|string|max:255',
            'departur' => 'required|string',
            'destinasi' => 'required|string',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());

        return redirect()->route('admin.tickets.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('admin.tickets.index')->with('success', 'Tiket berhasil dihapus.');
    }

    public function listAvailableTickets()
    {
        $tickets = Ticket::all();
        return view('user.index', compact('tickets'));
    }

    public function orderTicket(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        Order::create([
            'ticket_id' => $ticket->id,
            'order_date' => now(),
        ]);

        return redirect()->route('user.history')->with('success', 'Ticket has been successfully booked!');
    }

    public function orderHistory()
    {
        $orders = Order::with('ticket')->get();
        return view('user.history', compact('orders'));
    }
}
