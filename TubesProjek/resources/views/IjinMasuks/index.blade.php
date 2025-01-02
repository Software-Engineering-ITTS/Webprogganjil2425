@extends('layouts.app')
@section('title', 'Ijin Masuk')

@include('components.navbar')
@section('content')
<h1 class="relative mt-10 ml-10 text-2xl fw-bold">Daftar Pengajuan Ijin Masuk</h1>
<div class="container mx-auto mt-10">
    <a href="{{ route('ijinMasuks.create') }}" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:shadow-2xl hover:opacity-80 transition duration-300 ease-in-out">Ajukan Ijin Masuk</a>
    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama User</th>
                <th class="border px-4 py-2">Ruangan</th>
                <th class="border px-4 py-2">Alasan</th>
                <th class="border px-4 py-2">Waktu Ijin</th>
                <th class="border px-4 py-2">Status Verifikasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ijinMasuks as $ijin)
                <tr>
                    <td class="border px-4 py-2">{{ $ijin->user->username }}</td>
                    <td class="border px-4 py-2">{{ $ijin->ruangan->nama }}</td>
                    <td class="border px-4 py-2">{{ $ijin->alasan }}</td>
                    <td class="border px-4 py-2">{{ $ijin->waktu_ijin }}</td>
                    <td class="border px-4 py-2">{{ $ijin->status_verifikasi }}</td>
                </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak Ada pengajuan ijin.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection