@extends('layout')

@section('title')
    Toko Buku
@endsection

@section('isi')
    <div>
        <h2 class="text-center mt-10 flex justify-center font-bold text-3xl">Edit Buku</h2>
        @if ($errors->any())
            <div class="alert alert-danger flex justify-center mt-3 bg-red-500 text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }} <span>!!!</span></li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="p-6 sm:px-20 bg-white flex justify-center">
            <form action="{{ route('barang.update', $bukus->id) }}" method="POST" enctype="multipart/from-bukus">
                @csrf
                <div class="mb-2">
                    <label for="judul" class="block text-xl font-medium text-gray-700">Judul Buku</label>
                    <input type="text" id="judul" name="judul" value="{{ $bukus->judul }}"
                        class="border-black border-2 rounded-md shadow-sm w-96 py-4 px-2">
                </div>
                <div class="mb-2">
                    <label for="fotos" class="block text-xl font-medium text-gray-700">Cover Buku</label>
                    <input type="file" id="fotos" name="fotos" value="{{ $bukus->fotos }}"
                        class="border-black border-2 rounded-md shadow-sm w-96 py-4 px-2">

                </div>
                <div class="mb-2">
                    <label for="pengarang" class="block text-xl font-medium text-gray-700">Pengarang</label>
                    <input type="text" id="pengarang" name="pengarang" value="{{ $bukus->pengarang }}"
                        class="border-black border-2 rounded-md shadow-sm w-96 py-4 px-2">

                </div>
                <div class="mb-2">
                    <label for="kategori" class="block text-xl font-medium text-gray-700">Kategori</label>
                    <input type="text" id="kategori" name="kategori" value="{{ $bukus->kategori }}"
                        class="border-black border-2 rounded-md shadow-sm w-96 py-4 px-2">

                </div>
                <div class="mb-2">
                    <label for="stock" class="block text-xl font-medium text-gray-700">Stok Buku</label>
                    <input type="number" id="stock" name="stock" value="{{ $bukus->stock }}"
                        class="border-black border-2  rounded-md shadow-sm w-96 py-4 px-2">

                </div>

                <div class="mb-2">
                    <label for="harga" class="block text-xl font-medium text-gray-700">Harga</label>
                    <input type="text" id="harga" name="harga" value="{{ $bukus->harga }}"
                        class="border-black border-2 rounded-md shadow-sm w-96 py-4 px-2">

                </div>
                <div class="flex justify-between">
                  <a href="{{ route('barang.index') }}" class="bg-yellow-800 text-white rounded p-3 px-10 mt-4">Kembali</a>
                  <button class=" bg-green-600 text-white rounded p-3 px-10 mt-4">Simpan</button>
                </div>
            </form>
        </div>
    @endsection
