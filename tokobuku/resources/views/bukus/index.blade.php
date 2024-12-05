@extends('layouts.app')
@section('title', 'Toko Buku')

@section('content')
<div class="container mx-auto mt-4">
    <a href="{{ route('bukus.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Buku</a>
    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Deskripsi</th>
                <th class="border px-4 py-2">Harga</th>
                <th class="border px-4 py-2">Stok</th>
                <th class="border px-4 py-2">Foto</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
            <tr>
                <td class="border px-4 py-2">{{ $buku->judul }}</td>
                <td class="border px-4 py-2">{{ $buku->deskripsi }}</td>
                <td class="border px-4 py-2">{{ $buku->harga }}</td>
                <td class="border px-4 py-2">{{ $buku->stok }}</td>
                <td class="border px-4 py-2">
                @if ($buku->foto)
                <img src="{{Storage::url($buku->foto)}}" alt="Foto" class="w-20"></td>
                @else
                 <span class="text-gray-500">Tidak ada foto</span>
                @endif
                <td class="border px-4 py-2">
                    <a href="{{ route('bukus.edit', $buku->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('data akan dihapus, apa anda yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection