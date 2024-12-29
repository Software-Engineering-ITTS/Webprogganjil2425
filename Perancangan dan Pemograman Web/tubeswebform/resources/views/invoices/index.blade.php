@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Daftar Invoice</h1>
        <a href="{{ route('invoices.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Tambah Invoice
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="inline-block ml-2">
        <g fill="none" stroke="currentColor" stroke-dasharray="16" stroke-dashoffset="16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M5 12h14">
                <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="16;0"/>
            </path>
            <path d="M12 5v14">
                <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.4s" values="16;0"/>
            </path>
        </g>
    </svg>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left border-b">
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">No Invoice</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Customer</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Total</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $invoice)
                <tr class="border-b">
                    <td class="px-6 py-4">{{ $invoice->invoice_number }}</td>
                    <td class="px-6 py-4">{{ $invoice->customer->name ?? 'Customer tidak ditemukan' }}</td>
                    <td class="px-6 py-4">{{ date('d/m/Y', strtotime($invoice->invoice_date)) }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                               ($invoice->status === 'unpaid' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ $invoice->status === 'paid' ? 'Lunas' : 'Belum Lunas' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('invoices.show', $invoice) }}" class="text-blue-600 hover:text-blue-800">Detail</a>
                        <a href="{{ route('invoices.edit', $invoice) }}" class="text-yellow-600 hover:text-yellow-800">Edit</a>
                        <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus invoice ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data invoice
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