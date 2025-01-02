@extends('layouts.app')

@section('title', 'Tambah Ruangan')

@section('content')
<a href="{{route('ruangans.index')}}" class="relative flex bg-teal-500 px-5 py-2 w-44 rounded-lg text-white mt-10 ml-10">Kembali ke Home</a>
<section class="container pl-44 pt-7 mt-20">
    <h1 class="text-2xl font-bold">Tambah Ruangan</h1>
    <form action="{{ route('ruangans.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>

            <label for="nama" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Nama Ruangan
                </span>
                <input type="text" name="nama" id="nama" class="mt-1 px-9 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nama Ruangan" />

        </div>

        <div>
            <label for="deskripsi" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Deskripsi Ruangan
                </span>
                <textarea name="deskripsi" id="deskripsi" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" placeholder="Masukkan Deskripsi Ruangan" required></textarea>
        </div>

        <div>
            <label for="kapasitas" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Kapasitas Ruangan
                </span>
                <input name="kapasitas" id="kapasitas" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" placeholder="Masukkan Kapasitas Ruangan" required></input>
        </div>

        <div>
            <label for="status" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Status Ruangan
                </span>
                <input name="status" id="status" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" placeholder="Masukkan Status Ruangan (Kosong)" required></input>
        </div>

        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</section>
@endsection