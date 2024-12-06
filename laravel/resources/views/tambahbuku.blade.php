@extends('index') 

@section('content') 
<form method="POST" action="/buku" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" name="judul" id="judul">
    </div>
    <div class="mb-3">
        <label for="penulis" class="form-label">Penulis buku</label>
        <input type="text" class="form-control" name="penulis" id="penulis">
    </div>
    <div>
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga">
    </div>
    <div>
        <label for="tanggal">Tanggal Terbit</label>
        <input type="date" name="tanggal" id="tanggal">
    </div>
    <div>
        <label for="cover">cover buku</label>
        <input type="file" id="cover" name="cover">
    </div>
    <div>
        <label for="stock">Jumlah buku</label>
        <input type="number" name="stock" id="stock">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
