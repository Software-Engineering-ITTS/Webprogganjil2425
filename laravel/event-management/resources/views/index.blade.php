@extends('layouts.app')

@section('title', 'Kegiatan Admin')

@section('content')
    <h2>Daftar Kegiatan</h2>
    <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kegiatans as $kegiatan)
            <tr>
                <td>{{ $kegiatan->nama_kegiatan }}</td>
                <td>{{ $kegiatan->deskripsi }}</td>
                <td>{{ $kegiatan->tanggal_kegiatan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
