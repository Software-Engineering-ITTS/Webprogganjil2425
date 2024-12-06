
@extends('layouts.layout')

@section('title', 'Tambah Buku')
@section('header', 'Tambah Buku Baru')

@section('content')
<div class="bg-white shadow-md rounded my-6 p-6">
    <form action="{{ route('TokoBuku.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="NAMA" class="block font-medium">Nama Buku</label>
            <input type="text" id="NAMA" name="NAMA" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="TIPE" class="block font-medium">Tipe Buku</label>
            <input type="text" id="TIPE" name="TIPE" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="cover_buku" class="block font-medium">Cover Buku</label>
            <input type="file" id="cover_buku" name="cover_buku" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="PENGARANG" class="block font-medium">pengarang</label>
            <input type="text" id="PENGARANG" name="PENGARANG" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="PENERBIT" class="block font-medium">Penerbit</label>
            <input type="text" id="PENERBIT" name="PENERBIT" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="TAHUN" class="block font-medium">Tahun Terbit</label>
            <input type="number" id="TAHUN" name="TAHUN" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
    </form>
</div>
@endsection
