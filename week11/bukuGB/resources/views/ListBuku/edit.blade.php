@extends('layouts.app') {{-- Panggil layout utama --}}

@section('title', 'edit Buku') {{-- Judul halaman --}}

@section('content') {{-- Konten khusus untuk halaman ini --}}
<div>
    <h1>Edit Buku</h1>
    <form action="{{ route('ListBuku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}">
        </div>

        <div>
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $buku->deskripsi) }}">
        </div>

        <div>
            <label for="penulis">Penulis Buku</label>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $buku->penulis) }}">
        </div>

        <div>
            <label for="harga">Harga Buku</label>
            <input type="number" name="harga" id="harga" value="{{ old('harga', $buku->harga) }}">
        </div>

        <div>
            <label for="stok">Stok Buku</label>
            <input type="number" name="stok" id="stok" value="{{ old('stok', $buku->stok) }}">
        </div>

        <div>
            <label for="foto">Foto Buku</label>
            <input type="file" name="foto" id="foto">
            @if ($buku->foto)
                <p>Foto saat ini:</p>
                <img src="{{ Storage::url($buku->foto) }}" alt="Foto Buku" width="150">
            @endif
        </div>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
