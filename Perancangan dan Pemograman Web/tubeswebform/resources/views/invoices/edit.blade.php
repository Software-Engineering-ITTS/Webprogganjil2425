@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Invoice #{{ $invoice->invoice_number }}</h2>
    </div>

    <form action="{{ route('invoices.update', $invoice) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Customer Selection -->
            <div>
                <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
                <select name="customer_id" id="customer_id" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Invoice Number (readonly) -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor Invoice</label>
                <input type="text" value="{{ $invoice->invoice_number }}" class="mt-1 block w-full rounded-md bg-gray-100" readonly>
            </div>

            <!-- Invoice Date -->
            <div>
                <label for="invoice_date" class="block text-sm font-medium text-gray-700">Tanggal Invoice</label>
                <input type="date" name="invoice_date" id="invoice_date" 
                    value="{{ $invoice->invoice_date->format('Y-m-d') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('invoice_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Due Date -->
            <div>
                <label for="due_date" class="block text-sm font-medium text-gray-700">Jatuh Tempo</label>
                <input type="date" name="due_date" id="due_date" 
                    value="{{ $invoice->due_date->format('Y-m-d') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('due_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="unpaid" {{ $invoice->status === 'unpaid' ? 'selected' : '' }}>Belum Lunas</option>
                    <option value="paid" {{ $invoice->status === 'paid' ? 'selected' : '' }}>Lunas</option>
                    <option value="cancelled" {{ $invoice->status === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tax -->
            <div>
                <label for="tax" class="block text-sm font-medium text-gray-700">Pajak (%)</label>
                <input type="number" name="tax" id="tax" step="0.01"
                    value="{{ ($invoice->tax / $invoice->total_amount) * 100 }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('tax')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Notes -->
            <div class="md:col-span-2">
                <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea name="notes" id="notes" rows="3" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $invoice->notes }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Invoice Items -->
        <div class="mt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Items</h3>
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2 text-left">Item</th>
                        <th class="px-4 py-2 text-right">Quantity</th>
                        <th class="px-4 py-2 text-right">Harga</th>
                        <th class="px-4 py-2 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->items as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->item_name }}</td>
                        <td class="border px-4 py-2 text-right">{{ $item->quantity }}</td>
                        <td class="border px-4 py-2 text-right">Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2 text-right">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="border px-4 py-2 text-right font-bold">Total:</td>
                        <td class="border px-4 py-2 text-right">Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('invoices.show', $invoice) }}" 
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Batal
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Update Invoice
            </button>
        </div>
    </form>
</div>
@endsection