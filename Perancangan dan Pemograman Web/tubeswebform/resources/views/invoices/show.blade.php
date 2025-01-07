@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detail Invoice</h2>
        <div class="space-x-2">
            <a href="{{ route('invoices.pdf', $invoice) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                Download PDF
            </a>
            <a href="{{ route('invoices.edit', $invoice) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                Edit Invoice
            </a>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6 mb-6">
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Info Invoice</h3>
            <p class="text-gray-600">Invoice Number: {{ $invoice->invoice_number }}</p>
            <p class="text-gray-600">Tanggal: {{ $invoice->invoice_date->format('d/m/Y') }}</p>
            <p class="text-gray-600">Jatuh Tempo: {{ $invoice->due_date->format('d/m/Y') }}</p>
            <p class="text-gray-600">Status: 
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                    {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                       ($invoice->status === 'unpaid' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                    {{ ucfirst($invoice->status) }}
                </span>
            </p>
        </div>

        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Info Customer</h3>
            <p class="text-gray-600">Nama: {{ $invoice->customer->name }}</p>
            <p class="text-gray-600">Email: {{ $invoice->customer->email }}</p>
            <p class="text-gray-600">Phone: {{ $invoice->customer->phone }}</p>
            <p class="text-gray-600">Alamat: {{ $invoice->customer->address }}</p>
        </div>
    </div>

    <!-- Invoice Items -->
    <div class="mb-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Items</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Item</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($invoice->items as $item)
                    <tr>
                        <td class="px-6 py-4">{{ $item->item_name }}</td>
                        <td class="px-6 py-4">{{ $item->quantity }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="px-6 py-3 text-right font-medium">Subtotal:</td>
                        <td class="px-6 py-3">Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="px-6 py-3 text-right font-medium">Pajak:</td>
                        <td class="px-6 py-3">Rp {{ number_format($invoice->tax, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="font-bold">
                        <td colspan="3" class="px-6 py-3 text-right">Total:</td>
                        <td class="px-6 py-3">Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Payment History -->
    <div class="mb-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Riwayat Pembayaran</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Metode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Reference</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($invoice->payments as $payment)
                    <tr>
                        <td class="px-6 py-4">{{ $payment->payment_date->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ ucfirst($payment->payment_method) }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $payment->status === 'success' ? 'bg-green-100 text-green-800' : 
                                   ($payment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $payment->payment_reference ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if($invoice->notes)
    <div class="mt-6">
        <h3 class="text-lg font-medium text-gray-900 mb-2">Catatan</h3>
        <p class="text-gray-600">{{ $invoice->notes }}</p>
    </div>
    @endif
</div>
@endsection