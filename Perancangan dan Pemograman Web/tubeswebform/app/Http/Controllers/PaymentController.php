<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    public function index(Request $request)
{
    $query = Payment::with(['invoice', 'invoice.customer']);  // Eager loading

    // Filter by date range
    if ($request->filled('start_date')) {
        $query->whereDate('payment_date', '>=', $request->start_date);
    }
    if ($request->filled('end_date')) {
        $query->whereDate('payment_date', '<=', $request->end_date);
    }

    // Filter by status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $payments = $query->latest()->paginate(10);

    return view('payments.index', compact('payments'));
}

    public function create()
    {
        $invoices = Invoice::where('status', 'unpaid')->get();
        return view('payments.create', compact('invoices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,transfer,credit_card,debit_card',
            'payment_reference' => 'nullable|string',
            'payment_date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        $payment = Payment::create($validated);

        // Update invoice status if payment successful
        $invoice = Invoice::find($validated['invoice_id']);
        $totalPaid = $invoice->payments()->where('status', 'success')->sum('amount') + $validated['amount'];
        
        if ($totalPaid >= $invoice->grand_total) {
            $invoice->update(['status' => 'paid']);
        }

        return redirect()->route('payments.index')
            ->with('success', 'Pembayaran berhasil dicatat.');
    }

    public function show(Payment $payment)
    {
        $payment->load('invoice.customer');
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $invoices = Invoice::where('status', 'unpaid')->get();
        return view('payments.edit', compact('payment', 'invoices'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
           'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:cash,transfer,credit_card,debit_card',
            'payment_reference' => 'nullable|string',
            'status' => 'required|in:pending,success,failed',
            'notes' => 'nullable|string'
        ]);

        $payment->update($validated);

        if ($payment->status == 'success') {
            $invoice = $payment->invoice;
            $totalPaid = $invoice->payments()->where('status', 'success')->sum('amount');
            
            if ($totalPaid >= $invoice->grand_total) {
                $invoice->update(['status' => 'paid']);
            }
        }
        
        return redirect()->route('payments.index')
            ->with('success', 'Data pembayaran berhasil diupdate.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')
            ->with('success', 'Data pembayaran berhasil dihapus.');
    }
}