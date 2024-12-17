@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Invoice</h2>
        <a href="{{ route('invoices.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Buat Invoice Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Invoice</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jatuh Tempo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($invoices as $invoice)
                <tr>
                    <td class="px-6 py-4">{{ $invoice->invoice_number }}</td>
                    <td class="px-6 py-4">{{ $invoice->customer->name }}</td>
                    <td class="px-6 py-4">{{ $invoice->invoice_date->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">{{ $invoice->due_date->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                               ($invoice->status === 'unpaid' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($invoice->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('invoices.show', $invoice) }}" class="text-blue-600 hover:text-blue-900">View</a>
                        <a href="{{ route('invoices.edit', $invoice) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                        <a href="{{ route('invoices.pdf', $invoice) }}" class="text-green-600 hover:text-green-900">PDF</a>
                        <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $invoices->links() }}
    </div>
</div>
@endsection