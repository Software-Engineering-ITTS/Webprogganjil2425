@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Pembayaran</h2>
    </div>

    <form action="{{ route('payments.update', $payment) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Invoice Info (Read Only) -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor Invoice</label>
                <input type="text" value="{{ $payment->invoice->invoice_number }}" 
                    class="mt-1 block w-full rounded-md bg-gray-100" readonly>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Customer</label>
                <input type="text" value="{{ $payment->invoice->customer->name }}" 
                    class="mt-1 block w-full rounded-md bg-gray-100" readonly>
            </div>

            <!-- Payment Date -->
            <div>
                <label for="payment_date" class="block text-sm font-medium text-gray-700">Tanggal Pembayaran</label>
                <input type="date" name="payment_date" id="payment_date" 
                    value="{{ old('payment_date', $payment->payment_date->format('Y-m-d')) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('payment_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Amount -->
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Pembayaran</label>
                <input type="number" name="amount" id="amount" step="0.01"
                    value="{{ old('amount', $payment->amount) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('amount')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Payment Method -->
            <div>
                <label for="payment_method" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select name="payment_method" id="payment_method"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="cash" {{ $payment->payment_method === 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="transfer" {{ $payment->payment_method === 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                    <option value="credit_card" {{ $payment->payment_method === 'credit_card' ? 'selected' : '' }}>Kartu Kredit</option>
                    <option value="debit_card" {{ $payment->payment_method === 'debit_card' ? 'selected' : '' }}>Kartu Debit</option>
                </select>
                @error('payment_method')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Payment Reference -->
            <div>
                <label for="payment_reference" class="block text-sm font-medium text-gray-700">Referensi Pembayaran</label>
                <input type="text" name="payment_reference" id="payment_reference" 
                    value="{{ old('payment_reference', $payment->payment_reference) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('payment_reference')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="pending" {{ $payment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="success" {{ $payment->status === 'success' ? 'selected' : '' }}>Success</option>
                    <option value="failed" {{ $payment->status === 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Notes -->
            <div class="md:col-span-2">
                <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea name="notes" id="notes" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes', $payment->notes) }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('payments.show', $payment) }}" 
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Batal
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Update Pembayaran
            </button>
        </div>
    </form>
</div>
@endsection