@extends('layouts.app')
@section('title', 'Halaman Approval')

@include('components.navbar')
@section('content')
<h1 class="relative mt-10 ml-10 text-2xl fw-bold">Daftar Pengajuan Ijin Masuk - Pending</h1>
<div class="container mx-auto mt-10">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama User</th>
                <th class="border px-4 py-2">Ruangan</th>
                <th class="border px-4 py-2">Alasan</th>
                <th class="border px-4 py-2">Waktu Ijin</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ijinMasuks as $ijin)
                <tr>
                    <td class="border px-4 py-2">{{ $ijin->user->username }}</td>
                    <td class="border px-4 py-2">{{ $ijin->ruangan->nama }}</td>
                    <td class="border px-4 py-2">{{ $ijin->alasan }}</td>
                    <td class="border px-4 py-2">{{ $ijin->waktu_ijin }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('ijinMasuks.approve', $ijin->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-teal-500 text-white px-5 py-1 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Setujui</button>
                        </form>
                        <form action="{{ route('ijinMasuks.reject', $ijin->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit"  class="bg-red-500 text-white px-5 py-1 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Tolak</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada pengajuan ijin masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
