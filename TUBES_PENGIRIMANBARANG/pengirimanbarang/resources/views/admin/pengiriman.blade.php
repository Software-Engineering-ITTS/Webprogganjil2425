@extends('layout')

@section('title')
    PENGIRIMAN
@endsection

@section('isi')
    <div class="bg-gray-100 font-sans leading-normal tracking-normal">
        <div class="flex min-h-screen">
            <aside class="bg-indigo-600 text-white w-64 flex flex-col">
                <div>
                    <h1 class="text-white p-7 font-bold text-2xl">PENGIRIMAN BARANG</h1>
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
                    <h2 class="text-2xl font-semibold text-gray-800">PENGIRIMAN BARANG</h2>
                </header>
                <main class="flex-1 p-6 bg-gray-100">
                    @yield('content')
                    {{-- Form --}}
                    <div class="flex-1 flex flex-col">
                        <div class="flex-1 bg-gray-100">
                            <form action="{{ route('pengiriman.store') }}" method="POST"
                                class="max-w mx-auto bg-white p-6  shadow-md space-y-6">
                                <h2 class="text-xl font-bold mb-4">Kirim Barang</h2>
                                @csrf
                                <div>
                                    <label for="barang_id" class="block text-sm font-medium text-gray-700">Barang</label>
                                    <select id="barang_id" name="barang_id" required
                                        class="mt-1 block w-full p-3 border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="alamat_tujuan" class="block text-sm font-medium text-gray-700">Alamat
                                        Tujuan</label>
                                    <input type="text" id="alamat_tujuan" name="alamat_tujuan" required
                                        class="mt-1 block w-full p-2 border border-gray-300  shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="kurir" class="block text-sm font-medium text-gray-700">Kurir</label>
                                    <input type="text" id="kurir" name="kurir" required
                                        class="mt-1 block w-full p-2 border border-gray-300  shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="tanggal_pengiriman" class="block text-sm font-medium text-gray-700">Tanggal
                                        Pengiriman</label>
                                    <input type="date" id="tanggal_pengiriman" name="tanggal_pengiriman" required
                                        class="mt-1 block w-full p-2 border border-gray-300  shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <button type="submit"
                                    class="bg-indigo-500 text-white py-2 px-8 rounded-md hover:bg-indigo-600 ">
                                    Kirim
                                </button>
                            </form>
                            @if (session('success'))
                                <div class="mb-4 text-green-600">{{ session('success') }}</div>
                            @endif
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
