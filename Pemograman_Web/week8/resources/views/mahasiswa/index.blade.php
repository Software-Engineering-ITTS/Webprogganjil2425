@extends('layouts.app')

@section('content')
    <h1>Data Mahasiswa</h1>
    <a href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Alamat</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $mhs)
                <tr>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->prodi }}</td>
                    <td>{{ $mhs->alamat }}</td>
                    <td>{{ $mhs->fakultas->nama_fakultas }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
