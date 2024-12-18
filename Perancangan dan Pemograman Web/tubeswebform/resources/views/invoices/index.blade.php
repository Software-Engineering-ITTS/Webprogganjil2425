@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Daftar Invoice</h1>
        <a href="{{ route('invoices.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Tambah Invoice
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left border-b">
                    <th class="pb-3">NO INVOICE</th>
                    <th class="pb-3">CUSTOMER</th>
                    <th class="pb-3">TANGGAL</th>
                    <th class="pb-3">TOTAL</th>
                    <th class="pb-3">STATUS</th>
                    <th class="pb-3">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $invoice)
                <tr class="border-b">
                    <td class="py-3">{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->customer->name }}</td>
                    <td>{{ Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y') }}</td>
                    <td>Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}</td>
                    <td>
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                               'bg-yellow-100 text-yellow-800' }}">
                            {{ $invoice->status === 'paid' ? 'Lunas' : 'Belum Lunas' }}
                        </span>
                    </td>
                    <td class="flex space-x-2">
                        <a href="{{ route('invoices.show', $invoice) }}" class="text-blue-600 hover:text-blue-800">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-3 text-center text-gray-500">
                        Belum ada data invoice
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $invoices->links() }}
    </div>
</div>
@endsection