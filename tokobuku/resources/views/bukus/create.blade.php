@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<section class="container pl-44 pt-7">
    <h1 class="text-2xl font-bold">Tambah Buku</h1>
    <form action="{{ route('bukus.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>

        <label for="judul" class="block">
        <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
            Judul Buku
        </span>
        <input type="text" name="judul" id="judul" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Judul Buku" />

        </div>

        <div>

        <label for="deskripsi" class="block">
        <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
            Deskripsi Buku
        </span>
        <textarea name="deskripsi" id="deskripsi" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1 w-96" placeholder="Masukkan Deskripsi Buku" required></textarea>

        </div>

        <div>

        <label for="harga" class="block">
        <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
            Harga Buku
        </span>
        <input type="text" name="harga" id="harga" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Harga Buku" required/>

        </div>

        <div>

        <label for="stok" class="block">
        <span class="after:content-['*'] after:text-red-500 block text-sm font-medium text-slate-700">
            Stok Buku
        </span>
        <input type="number" name="stok" id="stok" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Stok Buku" required/>

        </div>

        <div>

            <label for="foto" class="">Foto Buku</label>
            <input type="file" id="foto" name="foto" class="">

        </div>

        <div>
            <label for="id_categories" class="">Kategori</label>
            <select id="id_categories" name="id_categories" class="" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id_categories" value="1">
        </div>

        <div>
            <label for="id_authors" class="">Penulis</label>
            <select id="id_authors" name="id_authors" class="" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->nama }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id_authors" value="1">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</section>
@endsection
