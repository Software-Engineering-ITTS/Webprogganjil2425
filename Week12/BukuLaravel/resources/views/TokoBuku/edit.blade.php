
@extends('layouts.layout')

@section('title', 'Edit Buku')
@section('header', 'Edit Buku')

@section('content')
<div class="bg-white shadow-md rounded my-6 p-6">
    <form action="{{ route('TokoBuku.update', $buku->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="NAMA" class="block font-medium">Nama Buku</label>
            <input type="text" id="NAMA" name="NAMA" value="{{ $buku->NAMA }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="TIPE" class="block font-medium">TIPE Buku</label>
            <input type="text" id="TIPE" name="TIPE" value="{{ $buku->TIPE }}" class="w-full border rounded px-3 py-2" required>
        </div> 
        <div>
            <label for="cover_buku" class="block font-medium">COVER Buku</label>
            <input type="file" id="cover_buku" name="cover_buku" value="{{ $buku->cover_buku }}" class="w-full border rounded px-3 py-2" required>
        </div> 
        <div>
            <label for="PENGARANG" class="block font-medium">Pengarang</label>
            <input type="text" id="PENGARANG" name="PENGARANG" value="{{ $buku->PENGARANG }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="PENERBIT" class="block font-medium">Penerbit</label>
            <input type="text" id="PENERBIT" name="PENERBIT" value="{{ $buku->PENERBIT }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label for="TAHUN" class="block font-medium">Tahun Terbit</label>
            <input type="number" id="TAHUN" name="TAHUN" value="{{ $buku->TAHUN }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
</div>
@endsection

