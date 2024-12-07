@extends('layout.app')

@section('title', 'Transactions')

@section('content')
<div class="container mx-auto p-6 bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Riwayat Transaksi</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Judul</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Pembeli</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jumlah</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Total Harga</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi as $transaksi)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->book->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->pembeli }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->quantity }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($transaksi->total_price, 2, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">Tidak ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
