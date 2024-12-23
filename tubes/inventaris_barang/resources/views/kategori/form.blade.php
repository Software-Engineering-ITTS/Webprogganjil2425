@extends('layouts.app')

@section('content')
<div class="m-4 ">
    <p class="text-4xl text-white dark:text-white font-extrabold text-center">Form Kategori Barang</p>
    <form class="max-w-sm mx-auto" action="{{ isset($category) ? route('barang-category.update', $category->id) : route('barang-category.store') }}" method="POST" id="categoryForm">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif

        <input type="hidden" name="id" value="{{ isset($category) ? $category->id : old('id') }}">

        <div class="mb-5">
            <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori</label>
            <input
                type="text"
                id="nama_kategori"
                name="nama_kategori"
                value="{{ isset($category) ? $category->nama_kategori : old('nama_kategori') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nama Kategori"
                required />
        </div>

        <div class="flex justify-between">
            <button
                type="button"
                onclick="document.getElementById('categoryForm').reset();"
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
