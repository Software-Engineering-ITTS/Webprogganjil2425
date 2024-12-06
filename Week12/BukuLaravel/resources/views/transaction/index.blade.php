
@extends('layouts.layoutTran')

@section('title', 'Daftar Transaksi')
@section('header', 'Daftar Transaksi')

@section('content')
<div class="bg-white shadow-md rounded my-6 p-6">
    <a href="{{ route('transaction.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Transaksi</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Buku</th>
                <th class="px-4 py-2">Tanggal Transaksi</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $item)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $item->buku_id }}</td>
                <td class="border px-4 py-2">{{ $item->transaction_date }}</td>
                <td class="border px-4 py-2">{{ $item->status }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('transaction.edit', $item->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('transaction.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
