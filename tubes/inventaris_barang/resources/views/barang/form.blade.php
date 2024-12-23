@extends('layouts.app')

@section('content')
<div class="m-4 ">
    <p class="text-4xl text-white dark:text-white font-extrabold text-center">Form Barang</p>
    <form class="max-w-sm mx-auto" 
          action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}" 
          method="POST" 
          enctype="multipart/form-data" 
          id="barangForm">
        @csrf
        @if(isset($barang))
        @method('PUT')
        @endif

        <input type="hidden" name="id" id="id" value="{{ isset($barang) ? $barang->id : old('id') }}">

        <!-- KODE BARANG-->
        <div class="mb-5">
            <label for="kode_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Barang</label>
            <input
                type="text"
                id="kode_barang"
                name="kode_barang"
                value="{{ isset($barang) ? $barang->kode_barang : old('kode_barang') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5"
                placeholder="Masukkan kode barang"
                required />
        </div>

        <!-- Nama Barang -->
        <div class="mb-5">
            <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
            <input
                type="text"
                id="nama_barang"
                name="nama_barang"
                value="{{ isset($barang) ? $barang->nama_barang : old('nama_barang') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5"
                placeholder="Masukkan nama barang"
                required />
        </div>

        <!-- KATEGORI -->
        <div class="mb-5">
            <label for="kategori_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
            <select id="kategori_id" name="kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ isset($barang) && $barang->kategori_id == $category->id ? 'selected' : '' }}>
                    {{ $category->nama_kategori }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- DITERIMA -->
        <div class="mb-5">
            <label for="tanggal_diterima" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Diterima</label>
            <input
                type="date"
                id="tanggal_diterima"
                name="tanggal_diterima"
                value="{{ isset($barang) ? $barang->tanggal_diterima : old('tanggal_diterima') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5"
                required />
        </div>

        <!-- EXPIRED -->
        <div class="mb-5">
            <label for="tanggal_expired" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Expired</label>
            <input
                type="date"
                id="tanggal_expired"
                name="tanggal_expired"
                value="{{ isset($barang) ? $barang->tanggal_expired : old('tanggal_expired') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5" />
        </div>

        <!-- STOCK -->
        <div class="mb-5">
            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ isset($barang) ? $barang->stock : old('stock') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5"
                placeholder="Masukkan jumlah stock"
                required />
        </div>

        <!-- CATATAN -->
        <div class="mb-5">
            <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
            <textarea
                id="catatan"
                name="catatan"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5"
                placeholder="Catatan tambahan">{{ isset($barang) ? $barang->catatan : old('catatan') }}</textarea>
        </div>

        <div class="flex justify-between">
            <button
                type="button"
                onclick="document.getElementById('barangForm').reset();"
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
