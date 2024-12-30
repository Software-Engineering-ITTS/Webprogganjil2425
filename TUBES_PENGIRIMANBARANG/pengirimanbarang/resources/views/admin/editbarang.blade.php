@extends('layout')

@section('title')
    EDIT BARANG
@endsection

@section('isi')
    <div class="bg-gray-100 font-sans leading-normal tracking-normal">
        <div class="flex min-h-screen">
            <aside class="bg-indigo-600 text-white w-64 flex flex-col">
                <div>
                    <h1 class="text-white p-7 font-bold text-2xl">EDIT BARANG</h1>
                </div>
                <nav class="flex-1">
                    <ul class="space-y-2 px-4 pl-9">
                        <li class="flex gap-2">
                            <img src="../icons/home.svg" alt="">
                            <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-indigo-800">
                                Dashboard
                            </a>
                        </li>
                        <li class="flex gap-2">
                            <img src="../icons/package.svg" alt="">
                            <a href="{{ route('formbarang') }}" class="block py-2 px-4 rounded hover:bg-indigo-800">
                                Form Barang
                            </a>
                        </li>
                        <li class="flex gap-2">
                            <img src="../icons/truck.svg" alt="">
                            <a href="{{ route('pengiriman.create') }}" class="block py-2 px-4 rounded hover:bg-indigo-800">
                                Pengiriman
                            </a>
                        </li>
                        <li class="flex gap-2">
                            <img src="../icons/bar-chart.svg" alt="">
                            <a href="{{ route('statusbarang.create') }}"
                                class="block py-2 px-4 rounded hover:bg-indigo-800">
                                Status barang
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="px-4 py-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">
                            Keluar
                        </button>
                    </form>
                </div>
            </aside>
            <div class="flex-1 flex flex-col">
                <header class="bg-white shadow py-4 px-6">
                    <h2 class="text-2xl font-semibold text-gray-800">EDIT BARANG</h2>
                </header>
                <main class="flex-1 p-6 bg-gray-100">
                    @yield('content')
                    <div class="p-6 bg-white shadow-md rounded">
                        <h2 class="text-xl font-semibold text-gray-800 py-3">Edit Barang</h2>
                        <form action="{{ route('formbarang.edit', $barang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="nama" class="block text-sm font-medium">Nama Barang</label>
                                <input type="text" name="nama" id="nama" class="mt-1 p-2 w-full border "
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="foto" class="block text-sm font-medium">Gambar</label>
                                <input type="file" name="foto" id="foto" class="mt-1 p-2 w-full border "
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="stok" class="block text-sm font-medium">Stok</label>
                                <input type="number" name="stok" id="stok" class="mt-1 p-2 w-full border "
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="harga" class="block text-sm font-medium">Harga</label>
                                <input type="number" step="0.01" name="harga" id="harga"
                                    class="mt-1 p-2 w-full border " required>
                            </div>
                            <button type="submit"
                                class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-2 rounded">Update</button>
                            <a class="bg-red-500 hover:bg-red-600 text-white py-2.5 px-6 rounded"
                                href="{{ route('formbarang') }}">Kembali</a>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
