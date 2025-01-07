@extends('layout')

@section('konten')

<h4 class="text-center">Tambah Mesin</h4>

<form action="{{ route('mesin.submit') }}" method="post">
    @csrf
    <label>Nomor Mesin:</label>
    <input type="text" name="no_mesin" class="form-control mb-2">

    <label>Nama Mesin:</label>
    <input type="text" name="nama_mesin" class="form-control mb-2">

    <label>Spare Part:</label>
    <input type="text" name="sparepart_mesin" class="form-control mb-2">

    <label>Fungsi Mesin:</label>
    <input type="text" name="fungsi_mesin" class="form-control mb-2">

    <label>Deskripsi/Keterangan:</label>
    <input type="text" name="deskripsi" class="form-control mb-2">

    <button class="btn btn-primary">Tambah</button>
</form>

@endsection
