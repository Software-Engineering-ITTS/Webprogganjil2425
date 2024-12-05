@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="container pl-44 pt-7">
    <h1 class="text-2xl font-bold">Edit Buku</h1>
    <form method="POST" action="{{route('bukus.update', $buku)}}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

    
        <div>

        <label for="judul" class="block">
        <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
        Judul Buku
        </span>
        <input type="text"  value="{{ $buku -> judul }}"  name="judul" id="judul" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Judul Buku" />

        </div>

        <div>

        <label for="deskripsi" class="block">
        <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
            Deskripsi Buku
        </span>
        <textarea  name="deskripsi" id="deskripsi" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" placeholder="Masukkan Deskripsi Buku" required>{{ $buku -> deskripsi}}</textarea>

        </div>

        <div>

        <label for="harga" class="block">
        <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
            Harga Buku
        </span>
        <input value="{{$buku -> harga}}" type="text" name="harga" id="harga" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Harga Buku" required/>

        </div>

        <div>

        <label for="stok" class="block">
        <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
            Stok Buku
        </span>
        <input type="number" value="{{$buku -> stok}}" name="stok" id="stok" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Stok Buku" required/>

        </div>

        <div>

            <label for="foto" class="">Foto Buku</label>
            <input type="file" id="foto" name="foto" class="">
            @if ($buku->foto)
                <img src="{{ asset('storage/' . $buku->foto) }}" alt="Foto Buku" class="w-20 mt-2">
            @endif
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
