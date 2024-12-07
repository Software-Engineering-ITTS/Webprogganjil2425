@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Buku</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="card shadow p-4">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Buku</label>
            <input type="file" id="cover_image" name="cover_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection