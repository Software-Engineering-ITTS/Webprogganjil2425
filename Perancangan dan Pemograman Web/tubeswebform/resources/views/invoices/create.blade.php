@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Buat Invoice Baru</h2>
    </div>

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
                <select name="customer_id" id="customer_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Pilih Customer</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="invoice_date" class="block text-sm font-medium text-gray-700">Tanggal Invoice</label>
                <input type="date" name="invoice_date" id="invoice_date" value="{{ old('invoice_date') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('invoice_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="due_date" class="block text-sm font-medium text-gray-700">Jatuh Tempo</label>
                <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('due_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dynamic Invoice Items -->
            <div class="col-span-2">
                <div class="border rounded-lg p-4 space-y-4">
                    <h3 class="font-medium text-gray-700">Items</h3>
                    <div id="invoice-items">
                        <div class="grid grid-cols-12 gap-4 mb-2">
                            <div class="col-span-4">
                                <label class="block text-sm font-medium text-gray-700">Item</label>
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Qty</label>
                            </div>
                            <div class="col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Harga</label>
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Subtotal</label>
                            </div>
                        </div>
                        
                        <div class="item-row grid grid-cols-12 gap-4 mb-2">
                            <div class="col-span-4">
                                <input type="text" name="items[0][item_name]" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div class="col-span-2">
                                <input type="number" name="items[0][quantity]" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" min="1">
                            </div>
                            <div class="col-span-3">
                                <input type="number" name="items[0][unit_price]" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" min="0">
                            </div>
                            <div class="col-span-2">
                                <input type="text" class="block w-full rounded-md border-gray-300 bg-gray-100" readonly>
                            </div>
                            <div class="col-span-1">
                                <button type="button" class="text-red-600 hover:text-red-900">Remove</button>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" id="add-item" class="mt-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                        + Tambah Item
                    </button>
                </div>
            </div>

            <div>
                <label for="tax" class="block text-sm font-medium text-gray-700">Pajak</label>
                <input type="number" name="tax" id="tax" value="{{ old('tax', 0) }}" step="0.01"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('tax')
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
            <a href="{{ route('invoices.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Simpan Invoice
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // JavaScript untuk menangani dynamic invoice items dan perhitungan
    let itemCount = 1;
    
    document.getElementById('add-item').addEventListener('click', function() {
        const template = `
            <div class="item-row grid grid-cols-12 gap-4 mb-2">
                <div class="col-span-4">
                    <input type="text" name="items[${itemCount}][item_name]" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="col-span-2">
                    <input type="number" name="items[${itemCount}][quantity]" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" min="1">
                </div>
                <div class="col-span-3">
                    <input type="number" name="items[${itemCount}][unit_price]" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" min="0">
                </div>
                <div class="col-span-2">
                    <input type="text" class="block w-full rounded-md border-gray-300 bg-gray-100" readonly>
                </div>
                <div class="col-span-1">
                    <button type="button" class="text-red-600 hover:text-red-900" onclick="removeItem(this)">Remove</button>
                </div>
            </div>
        `;
        
        document.getElementById('invoice-items').insertAdjacentHTML('beforeend', template);
        itemCount++;
    });

    function removeItem(button) {
        button.closest('.item-row').remove();
        calculateTotal();
    }

    function calculateTotal() {
        // Add calculation logic here
    }
</script>
@endpush
@endsection