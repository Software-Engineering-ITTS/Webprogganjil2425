@extends('layouts.app') {{-- Panggil layout utama --}}

@section('title', 'Daftar Buku') {{-- Judul halaman --}}

@section('content') {{-- Konten khusus untuk halaman ini --}}
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md mt-8">
    <h1 class="text-2xl font-bold mb-4">Tambah Buku</h1>
    <form action="{{ route('ListBuku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
            <input type="text" name="judul" id="judul" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis Buku</label>
            <input type="text" name="penulis" id="penulis" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga Buku</label>
            <input type="number" name="harga" id="harga" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="stok" class="block text-sm font-medium text-gray-700">Stok Buku</label>
            <input type="number" name="stok" id="stok" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="foto" class="">Foto Buku</label>
            <input type="file" name="foto" id="foto" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required>
        </div>

        <button type="submit" class="bg-black text-white px-6 py-3 ">Simpan</button>
    </form>
</div>
@endsection

