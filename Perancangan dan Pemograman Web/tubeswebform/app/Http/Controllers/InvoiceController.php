<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Tambahkan ini
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

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
        try {
            // Validasi input
            $validated = $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'invoice_date' => 'required|date',
                'due_date' => 'required|date|after_or_equal:invoice_date',
                'items' => 'required|array|min:1',
                'items.*.item_name' => 'required|string',
                'items.*.quantity' => 'required|numeric|min:1',
                'items.*.unit_price' => 'required|numeric|min:0',
                'tax' => 'nullable|numeric|min:0',
                'notes' => 'nullable|string'
            ]);

            // Hitung total
            $total_amount = 0;
            foreach ($request->items as $item) {
                $total_amount += $item['quantity'] * $item['unit_price'];
            }

            // Hitung pajak dan grand total
            $tax_amount = ($total_amount * ($request->tax ?? 0)) / 100;
            $grand_total = $total_amount + $tax_amount;

            // Buat invoice
            $invoice = Invoice::create([
                'invoice_number' => 'INV-' . time() . '-' . rand(100, 999),
                'customer_id' => $validated['customer_id'],
                'invoice_date' => $validated['invoice_date'],
                'due_date' => $validated['due_date'],
                'total_amount' => $total_amount,
                'tax' => $tax_amount,
                'grand_total' => $grand_total,
                'status' => 'unpaid',
                'notes' => $validated['notes'] ?? null
            ]);

            // Simpan items
            foreach ($request->items as $item) {
                $invoice->items()->create([
                    'item_name' => $item['item_name'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'subtotal' => $item['quantity'] * $item['unit_price']
                ]);
            }

            return redirect()->route('invoices.index')
                ->with('success', 'Invoice berhasil dibuat!');

        } catch (\Exception $e) {
            \Log::error('Error creating invoice: ' . $e->getMessage());
            return back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['customer', 'items', 'payments']);
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $customers = Customer::where('status', 'active')->get();
        $invoice->load('items');
        return view('invoices.edit', compact('invoice', 'customers'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        try {
            $validated = $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'invoice_date' => 'required|date',
                'due_date' => 'required|date|after:invoice_date',
                'tax' => 'required|numeric|min:0',
                'notes' => 'nullable|string',
                'status' => 'required|in:unpaid,paid,cancelled'
            ]);

            // Update invoice
            $invoice->update([
                'customer_id' => $validated['customer_id'],
                'invoice_date' => $validated['invoice_date'],
                'due_date' => $validated['due_date'],
                'tax' => $validated['tax'],
                'notes' => $validated['notes'],
                'status' => $validated['status']
            ]);

            return redirect()->route('invoices.show', $invoice)
                ->with('success', 'Invoice berhasil diupdate.');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroy(Invoice $invoice)
    {
        try {
            $invoice->items()->delete();
            $invoice->delete();
            return redirect()->route('invoices.index')
                ->with('success', 'Invoice berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus invoice.']);
        }
    }

    public function generatePDF(Invoice $invoice)
    {
        try {
            $invoice->load(['customer', 'items']);
            $pdf = PDF::loadView('invoices.pdf', compact('invoice'));
            return $pdf->download('invoice-'.$invoice->invoice_number.'.pdf');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat generate PDF.']);
        }
    }
}