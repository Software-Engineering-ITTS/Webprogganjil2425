@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Pembayaran</h2>
    </div>

    <form action="{{ route('payments.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="invoice_id" class="block text-sm font-medium text-gray-700">Invoice</label>
                <select name="invoice_id" id="invoice_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Pilih Invoice</option>
                    @foreach($invoices as $invoice)
                        <option value="{{ $invoice->id }}" {{ old('invoice_id') == $invoice->id ? 'selected' : '' }}
                            data-amount="{{ $invoice->grand_total }}">
                            {{ $invoice->invoice_number }} - {{ $invoice->customer->name }} 
                            (Rp {{ number_format($invoice->grand_total, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                @error('invoice_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="payment_date" class="block text-sm font-medium text-gray-700">Tanggal Pembayaran</label>
                <input type="date" name="payment_date" id="payment_date" value="{{ old('payment_date', date('Y-m-d')) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('payment_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Pembayaran</label>
                <input type="number" name="amount" id="amount" value="{{ old('amount') }}" step="0.01"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('amount')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="payment_method" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select name="payment_method" id="payment_method" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="cash" {{ old('payment_method') === 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="transfer" {{ old('payment_method') === 'transfer' ? 'selected' : '' }}>Transfer</option>
                    <option value="credit_card" {{ old('payment_method') === 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="debit_card" {{ old('payment_method') === 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                </select>
                @error('payment_method')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="payment_reference" class="block text-sm font-medium text-gray-700">Referensi Pembayaran</label>
                <input type="text" name="payment_reference" id="payment_reference" value="{{ old('payment_reference') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('payment_reference')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea name="notes" id="notes" rows="3" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes') }}</textarea>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('payments.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Simpan Pembayaran
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.getElementById('invoice_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const amount = selectedOption.dataset.amount;
        document.getElementById('amount').value = amount || '';
    });
</script>
@endpush
@endsection