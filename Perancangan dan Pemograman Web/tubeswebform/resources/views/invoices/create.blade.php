@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Buat Invoice Baru</h2>
    </div>

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Customer Selection -->
            <div>
                <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
                <select name="customer_id" id="customer_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
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

            <!-- Invoice Number (Auto-generated but can be modified) -->
            <div>
                <label for="invoice_number" class="block text-sm font-medium text-gray-700">Nomor Invoice</label>
                <input type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', 'INV-' . time()) }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" readonly>
            </div>

            <!-- Invoice Date -->
            <div>
                <label for="invoice_date" class="block text-sm font-medium text-gray-700">Tanggal Invoice</label>
                <input type="date" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', date('Y-m-d')) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('invoice_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Due Date -->
            <div>
                <label for="due_date" class="block text-sm font-medium text-gray-700">Jatuh Tempo</label>
                <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('due_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Invoice Items -->
        <div class="mt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Item Invoice</h3>
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

                <div class="invoice-item grid grid-cols-12 gap-4 mb-2">
                    <div class="col-span-4">
                        <input type="text" name="items[0][item_name]" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="col-span-2">
                        <input type="number" name="items[0][quantity]" value="1" min="1" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="col-span-3">
                        <input type="number" name="items[0][unit_price]" value="0" min="0" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="col-span-2">
                        <input type="text" class="block w-full rounded-md border-gray-300 bg-gray-100" readonly>
                    </div>
                    <div class="col-span-1">
                        <button type="button" class="text-red-600 hover:text-red-900 delete-item">Hapus</button>
                    </div>
                </div>
            </div>

            <button type="button" id="add-item" class="mt-2 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                + Tambah Item
            </button>
        </div>

        <!-- Tax and Notes -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label for="tax" class="block text-sm font-medium text-gray-700">Pajak (%)</label>
                <input type="number" name="tax" id="tax" value="{{ old('tax', 0) }}" min="0" max="100"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
                <textarea name="notes" id="notes" rows="3" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes') }}</textarea>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('invoices.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Batal
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
            <div class="invoice-item grid grid-cols-12 gap-4 mb-2">
                <div class="col-span-4">
                    <input type="text" name="items[${itemCount}][item_name]" required
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="col-span-2">
                    <input type="number" name="items[${itemCount}][quantity]" value="1" min="1" required
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="col-span-3">
                    <input type="number" name="items[${itemCount}][unit_price]" value="0" min="0" required
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="col-span-2">
                    <input type="text" class="block w-full rounded-md border-gray-300 bg-gray-100" readonly>
                </div>
                <div class="col-span-1">
                    <button type="button" class="text-red-600 hover:text-red-900 delete-item">Hapus</button>
                </div>
            </div>
        `;
        
        document.getElementById('invoice-items').insertAdjacentHTML('beforeend', template);
        itemCount++;
        updateCalculations();
    });

    // Delete item row
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-item')) {
            e.target.closest('.invoice-item').remove();
            updateCalculations();
        }
    });

    // Update calculations when inputs change
    document.addEventListener('input', function(e) {
        if (e.target.matches('input[name*="quantity"], input[name*="unit_price"]')) {
            updateCalculations();
        }
    });

    function updateCalculations() {
        const items = document.querySelectorAll('.invoice-item');
        items.forEach(item => {
            const quantity = parseFloat(item.querySelector('input[name*="quantity"]').value) || 0;
            const unitPrice = parseFloat(item.querySelector('input[name*="unit_price"]').value) || 0;
            const subtotal = quantity * unitPrice;
            item.querySelector('input[readonly]').value = subtotal.toLocaleString('id-ID');
        });
    }

    // Initialize calculations
    updateCalculations();
</script>
@endpush
@endsection