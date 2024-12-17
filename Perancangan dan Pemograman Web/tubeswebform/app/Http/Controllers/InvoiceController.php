<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer')->latest()->paginate(10);
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::where('status', 'active')->get();
        return view('invoices.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after:invoice_date',
            'total_amount' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        $validated['invoice_number'] = 'INV-' . time();
        $validated['grand_total'] = $validated['total_amount'] + $validated['tax'];
        $validated['status'] = 'unpaid';

        Invoice::create($validated);

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice berhasil dibuat.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['customer', 'items', 'payments']);
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $customers = Customer::where('status', 'active')->get();
        return view('invoices.edit', compact('invoice', 'customers'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after:invoice_date',
            'total_amount' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'status' => 'required|in:unpaid,paid,cancelled'
        ]);

        $validated['grand_total'] = $validated['total_amount'] + $validated['tax'];
        
        $invoice->update($validated);

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice berhasil diupdate.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')
            ->with('success', 'Invoice berhasil dihapus.');
    }
}