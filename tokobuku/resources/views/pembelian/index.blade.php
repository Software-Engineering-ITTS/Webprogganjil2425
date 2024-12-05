@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    <h1 class="text-2xl font-bold mb-4">Pembelian Buku</h1>

    <form action="{{ route('pembelian.store') }}" method="POST" class="bg-gray-100 p-4 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="buku_id" class="block text-gray-700">Pilih Buku</label>
            <select id="buku_id" name="buku_id" class="w-72 border-blue-300 rounded p-2 mt-1">
                <option value=""> Pilih Buku Yang Akan Dibeli </option>
                @foreach ($bukus as $buku)
                <option value="{{ $buku->id }}">{{ $buku->judul }} (Stok: {{ $buku->stok }})</option>
                @endforeach
            </select>
            @error('buku_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="jumlah" class="block text-gray-700">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" class="w-56 border-gray-300 rounded p-2 mt-3" min="1">
            @error('jumlah')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-40">Beli</button>
    </form>

    {{-- Daftar Buku --}}
    <h2 class="text-xl font-bold mt-8 mb-4">Daftar Buku</h2>
    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Deskripsi</th>
                <th class="border px-4 py-2">Harga</th>
                <th class="border px-4 py-2">Stok</th>
                <th class="border px-4 py-2">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
            <tr>
                <td class="border px-4 py-2">{{ $buku->judul }}</td>
                <td class="border px-4 py-2">{{ $buku->deskripsi }}</td>
                <td class="border px-4 py-2">{{ $buku->harga }}</td>
                <td class="border px-4 py-2">{{ $buku->stok }}</td>
                <td class="border px-4 py-2">
                    <img src="{{ asset('storage/' . $buku->foto) }}" alt="Foto Buku" class="w-20">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
