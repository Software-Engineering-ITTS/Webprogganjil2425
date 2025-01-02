@extends('layout')

@section('konten')

<h4 class="text-center">Edit Mesin</h4>

<form action="{{ route('mesin.update', $mesin->mesin_id) }}" method="post">
    @csrf
    <label>Nomor Mesin:</label>
    <input type="text" name="no_mesin" value="{{ $mesin->no_mesin }}" class="form-control mb-2">

    <label>Nama Mesin:</label>
    <input type="text" name="nama_mesin" value="{{ $mesin->nama_mesin }}" class="form-control mb-2">

    <label>Spare Part:</label>
    <input type="text" name="sparepart_mesin" value="{{ $mesin->sparepart_mesin }}" class="form-control mb-2">

    <label>Fungsi Mesin:</label>
    <input type="text" name="fungsi_mesin" value="{{ $mesin->fungsi_mesin }}" class="form-control mb-2">

    <label>Deskripsi/Keterangan:</label>
    <input type="text" name="deskripsi" value="{{ $mesin->deskripsi }}" class="form-control mb-2">

    <button class="btn btn-primary">Edit</button>
</form>

@endsection
