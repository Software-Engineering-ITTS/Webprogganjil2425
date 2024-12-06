
@extends('layouts.layoutTran')

@section('title', 'Tambah Transaksi')
@section('header', 'Tambah Transaksi Baru')

@section('content')
<div class="bg-white shadow-md rounded my-6 p-6">
    <form action="{{ route('transaction.store') }}" method="POST" class="space-y-4" enctype="">
        @csrf
        <div>
            <label for="buku_id" class="block font-medium">Id Buku</label>
            <input type="text" id="buku_id" name="buku_id" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="transaction_date" class="block font-medium">Tanggal Transaksi</label>
            <input type="date" id="transaction_date" name="transaction_date" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="status" class="block font-medium">Status Buku</label>
            <select id="status" name="status" class="w-full border rounded px-3 py-2" required>
                <option value="">---</option>
                <option value="sold">Terjual</option>
                <option value="available">Ada</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
    </form>
</div>
@endsection
