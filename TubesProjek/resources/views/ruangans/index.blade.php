@extends('layouts.app')
@section('title', 'Halaman Ruangan')

@include('components.navbar')
@section('content')
<h1 class="relative mt-10 ml-10 text-2xl fw-bold">Daftar Ruangan</h1>
<div class="container mx-auto mt-10">
    <a href="{{ route('ruangans.create') }}" class="bg-teal-500 text-white px-4 py-2 rounded hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Tambah ruangan</a>
    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama Ruangan</th>
                <th class="border px-4 py-2">Deskripsi</th>
                <th class="border px-4 py-2">Kapasitas</th>
                <th class="border px-4 py-2">Status Ruangan</th> 
                <th class="border px-4 py-2">Aksi</th> 
            </tr>
        </thead>
        <tbody>
            @forelse ($ruangans as $ruangan)
            <tr>
                <td class="border px-4 py-2">{{ $ruangan->nama }}</td>
                <td class="border px-4 py-2">{{ $ruangan->deskripsi }}</td>
                <td class="border px-4 py-2">{{ $ruangan->kapasitas }}</td>
                <td class="border px-4 py-2">{{ $ruangan->status }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('ruangans.edit', $ruangan->id) }}" class="bg-yellow-500 text-white px-4 py-1 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Edit</a>
                    <form action="{{ route('ruangans.destroy', $ruangan->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white rounded-full px-4 py-1 hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" onclick="return confirm('data akan dihapus, apa anda yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Ruangan Belum Ditambahkan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection