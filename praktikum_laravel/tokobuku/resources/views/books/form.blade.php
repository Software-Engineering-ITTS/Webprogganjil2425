@extends('layouts.app')

@section('content')
<div class="m-4 ">
    <p class="text-4xl text-white dark:text-white font-extrabold text-center">Form Buku</p>
    <form class="max-w-sm mx-auto" action="{{ isset($book) ? route('books.update', $id) : route('books.store') }}" method="post" method="POST" enctype="multipart/form-data" id="bookForm">
        @csrf
        @if(isset($book))
            @method('PUT')
        @endif

        <input type="hidden" name="id" id="id" value="{{ isset($book) ? $book->id : old('id') }}">

        <div class="mb-5">
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
            <input
                type="text"
                id="judul"
                name="judul"
                value="{{isset($book) ? $book->judul : old('judul')}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="judul"
                required />
        </div>

        <div class="mb-5">
            <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
            <input
                type="text"
                name="penulis"
                id="penulis"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Penulis"
                value="{{ isset($book) ? $book->penulis :old('penulis') }}"
                required />
        </div>


        <div class="mb-5">
            <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
            <input
                type="number"
                name="tahun_terbit"
                id="tahun_terbit"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Tahun Terbit"
                value="{{ isset($book) ? $book->tahun_terbit : old('tahun_terbit') }}"
                required />
        </div>


        <div class="mb-5">
            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
            <input
                type="number"
                name="stock"
                id="stock"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Stok"
                value="{{ isset($book) ? $book->stock : old('stock') }}"
                required />
        </div>


        <div class="mb-5">
            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
            <input
                type="number"
                name="harga"
                id="harga"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Harga"
                value="{{ isset($book) ? $book->harga : old('harga') }}"
                required />
        </div>


        <div class="mb-5">
            <label for="cover" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover</label>
            <input
                type="file"
                name="cover"
                id="cover"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                accept="image/*" />
            @if(isset($book) && $book->cover)
            <img height="50" src="{{ asset('storage/uploads/' . $book->cover) }}" />
            @endif
        </div>


        <div class="flex justify-between">

            <button
                type="button"
                onclick="document.getElementById('bookForm').reset();"
                class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg">
                Clear
            </button>
            <div class="mx-3"></div>
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-1">
                Submit
            </button>

        </div>
    </form>
</div>
@endsection