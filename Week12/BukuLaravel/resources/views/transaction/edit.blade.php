
@extends('layouts.layout')

@section('title', 'Edit Transaksi')
@section('header', 'Edit Transaksi')

@section('content')
<div class="bg-white shadow-md rounded my-6 p-6">
    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="buku_id" class="block font-medium">Buku</label>
            <input type="text" id="buku_id" name="buku_id" value="{{ $transaction->buku_id }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="transaction_date" class="block font-medium">Tanggal Transaksi</label>
            <input type="date" id="transaction_date" name="transaction_date" value="{{ $transaction->transaction_date }}" class="w-full border rounded px-3 py-2" required>
        </div> 
         <div>
            <label for="status" class="block font-medium">Status Buku</label>
            <select id="status" name="status" class="w-full border rounded px-3 py-2" required>
               <option value="{{ $transaction->status }}" selected>{{ ucfirst($transaction->status) }}</option>
                <option value="sold">Terjual</option>
                <option value="available">Ada</option>
            </select>
        </div>
      
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
</div>
@endsection

