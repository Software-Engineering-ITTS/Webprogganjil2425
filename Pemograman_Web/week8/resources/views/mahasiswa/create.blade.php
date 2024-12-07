@extends('layouts.app')

@section('content')
    <h1>Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <label>NIM:</label>
        <input type="text" name="nim" required>
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>Prodi:</label>
        <input type="text" name="prodi" required>
        <label>Alamat:</label>
        <textarea name="alamat" required></textarea>
        <label>Fakultas:</label>
        <select name="id_fakultas" required>
            @foreach ($fakultas as $fk)
                <option value="{{ $fk->id }}">{{ $fk->nama_fakultas }}</option>
            @endforeach
        </select>
        <button type="submit">Simpan</button>
    </form>
@endsection
