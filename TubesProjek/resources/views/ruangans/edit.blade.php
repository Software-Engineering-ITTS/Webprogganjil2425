@extends('layouts.app')

@section('title', 'Edit Ruangan')

@section('content')
<a href="{{route('ruangans.index')}}" class="relative flex bg-teal-500 px-5 py-2 w-44 rounded-lg text-white mt-10 ml-10">Kembali ke Home</a>

<section class="container pl-44 pt-7 mt-10 relative">
    <h1 class="text-2xl font-bold">Edit Ruangan</h1>
    <form action="{{ route('ruangans.update', $ruangan) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>

            <label for="nama" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Nama Ruangan
                </span>
                <input type="text" value="{{ $ruangan -> nama}}" name="nama" id="nama" class="mt-1 px-9 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nama Ruangan" />

        </div>

        <div>
            <label for="deskripsi" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Deskripsi Ruangan
                </span>
                <textarea name="deskripsi" value="{{ $ruangan -> deskripsi }}" id="deskripsi" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" placeholder="Masukkan Deskripsi Ruangan" required>{{ $ruangan -> deskripsi }}</textarea>
        </div>

        <div>
            <label for="kapasitas" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Kapasitas Ruangan
                </span>
                <input name="kapasitas" id="kapasitas" value="{{ $ruangan -> kapasitas}}" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" placeholder="Masukkan Kapasitas Ruangan" required></input>
        </div>

        <div>
            <label for="status" class="block">
                <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
                    Status Ruangan
                </span>
            </label>
            <div class="items-center space-x-2 mt-1">

                <label class="block items-center">
                    <input type="radio" name="status" value="Aktif"
                        {{ $ruangan->status == 'Aktif' ? 'checked' : '' }}
                    <span class="ml-2 text-slate-700">Aktif</span>
                </label>

                <label class="block items-center">
                    <input type="radio" name="status" value="Tidak Aktif"
                        {{ $ruangan->status == 'Tidak Aktif' ? 'checked' : '' }}
                    <span class=" text-slate-700">Tidak Aktif</span>
                </label>

            </div>
        </div>


        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</section>
@endsection