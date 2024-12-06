
@extends('layouts.layout')

@section('title', 'Daftar Buku')
@section('header', 'Daftar Buku')

@section('content')
<div class="bg-white shadow-md rounded my-6 p-6">
    <a href="{{ route('TokoBuku.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Buku</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama Buku</th>
                <th class="px-4 py-2">Tipe Buku</th>
                <th class="px-4 py-2">Cover Buku</th>
                <th class="px-4 py-2">Pengarang</th>
                <th class="px-4 py-2">Penerbit</th>
                <th class="px-4 py-2">Tahun Terbit</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2 ">{{ $item->NAMA }}</td>
                <td class="border px-4 py-2">{{ $item->TIPE }}</td>
                <td class="border px-4 py-2">
                {{-- {{ $item->cover_buku }} --}}
                <img src="{{ asset('storage/' . $item->cover_buku) }}" alt="Book Cover" class="h-40 w-40">
                </td>
                <td class="border px-4 py-2">{{ $item->PENGARANG }}</td>
                <td class="border px-4 py-2">{{ $item->PENERBIT }}</td>
                <td class="border px-4 py-2">{{ $item->TAHUN }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('TokoBuku.edit', $item->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('TokoBuku.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
