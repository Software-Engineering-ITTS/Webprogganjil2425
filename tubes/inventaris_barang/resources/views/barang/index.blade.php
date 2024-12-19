@extends('layouts.app')

@section('content')
<div class="m-4">
    <p class="text-4xl text-white dark:text-white font-extrabold">Data Barang</p>
    <a href="#">
        <button class="dark:text-white dark:bg-pink-600 text-white font-bold py-2 px-4 rounded my-4">
            Tambah Barang Baru
        </button>
    </a>
    <div class="relative">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th hidden scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expired Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $data)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td hidden class="px-6 py-4">
                        {{ $data->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->kode_barang }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->nama_barang }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->kategori->nama_kategori ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->tanggal_expired ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->stock }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <!-- Edit Button -->
                            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Edit Barang
                            </a>
                            <!-- Delete Button -->
                            <form method="POST" class="inline" action="#" onsubmit="return confirm('Are you sure you want to delete this barang?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 text-white dark:text-white">
            {{ $barangs->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
@endsection
