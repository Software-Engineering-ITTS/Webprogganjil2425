@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detail Customer</h2>
        <div class="flex space-x-2">
            <a href="{{ route('customers.edit', $customer) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                Edit Customer
            </a>
            <a href="{{ route('customers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Customer Information -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Customer</h3>
            <div class="space-y-3">
                <p class="text-gray-600">
                    <span class="font-medium">Nama:</span> 
                    {{ $customer->name }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Email:</span> 
                    {{ $customer->email }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Phone:</span> 
                    {{ $customer->phone }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Alamat:</span><br>
                    {{ $customer->address }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Status:</span>
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $customer->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ ucfirst($customer->status) }}
                    </span>
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Tanggal Registrasi:</span> 
                    {{ $customer->created_at->format('d/m/Y H:i') }}
                </p>
            </div>
        </div>

        <!-- Invoice Summary -->
        <div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">Ringkasan Invoice</h3>
            <div class="space-y-3">
                <p class="text-gray-600">
                    <span class="font-medium">Total Invoice:</span> 
                    {{ $customer->invoices->count() }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Total Tagihan:</span> 
                    Rp {{ number_format($customer->invoices->sum('grand_total'), 0, ',', '.') }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Total Pembayaran:</span> 
                    Rp {{ number_format($customer->invoices->flatMap->payments->where('status', 'success')->sum('amount'), 0, ',', '.') }}
                </p>
                <p class="text-gray-600">
                    <span class="font-medium">Sisa Tagihan:</span> 
                    Rp {{ number_format(
                        $customer->invoices->sum('grand_total') - 
                        $customer->invoices->flatMap->payments->where('status', 'success')->sum('amount'), 
                        0, ',', '.'
                    ) }}
                </p>
            </div>
        </div>
    </div>

    <!-- Recent Invoices -->
    <div class="mt-8">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Daftar Invoice</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Invoice</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($customer->invoices as $invoice)
                    <tr>
                        <td class="px-6 py-4">{{ $invoice->invoice_number }}</td>
                        <td class="px-6 py-4">{{ $invoice->invoice_date->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                                   ($invoice->status === 'unpaid' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($invoice->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('invoices.show', $invoice) }}" class="text-blue-600 hover:text-blue-900">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada invoice untuk customer ini
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection