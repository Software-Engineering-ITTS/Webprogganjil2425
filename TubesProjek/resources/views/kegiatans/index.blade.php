@extends('layouts.app')
@section('title', 'Halaman Kegiatan')

@include('components.navbar')
@section('content')
<h1 class="relative mt-10 ml-10 text-2xl fw-bold">Daftar Kegiatan</h1>
<div class="container mx-auto mt-10">
    <a href="{{ route('kegiatans.create') }}" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Tambah Kegiatan</a>
    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama Kegiatan</th>
                <th class="border px-4 py-2">Penanggung Jawab</th>
                <th class="border px-4 py-2">Waktu Mulai</th>
                <th class="border px-4 py-2">Waktu Selesai</th>
                <th class="border px-4 py-2">Ruangan</th>
                <th class="border px-4 py-2">Aktivitas Mencurigakan</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kegiatans as $kegiatan)
                <tr>
                    <td class="border px-4 py-2">{{ $kegiatan->nama_kegiatan }}</td>
                    <td class="border px-4 py-2">{{ $kegiatan->penanggung_jawab }}</td>
                    <td class="border px-4 py-2">{{ $kegiatan->waktu_mulai }}</td>
                    <td class="border px-4 py-2">{{ $kegiatan->waktu_selesai }}</td>
                    <td class="border px-4 py-2">{{ $kegiatan->ruangan->nama }}</td>
                    <td class="border px-4 py-2">{{ $kegiatan->aktivitas_mencurigakan ? 'Ya' : 'Tidak' }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('kegiatans.edit', $kegiatan->id) }}" class="bg-yellow-500 text-white px-5 py-1 rounded-full mt-2 hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Edit</a>
                        <form action="{{ route('kegiatans.destroy', $kegiatan->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-5 py-1 rounded-full mt-2 hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada Kegiatan Apapun.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
