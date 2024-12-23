@extends('layouts.app')

@section('content')
<div class="m-4">
    <p class="text-4xl text-white dark:text-white font-extrabold my-4">Kategori Barang</p>

    <!-- <!-- Display Success Message -->
    <!-- @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif -->

    <a href="{{ route('barang-category.create') }}">
        <button class=" dark:text-white dark:bg-pink-600 text-white font-bold py-2 px-4 rounded my-4">
            Tambah Category
        </button>
    </a>


    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th hidden scope="col" class="px-6 py-3">
                    Id
                </th>
           
                <th scope="col" class="px-6 py-3">
                    Nama Kategori
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $index => $category)
            <tr>
             
                <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $category->nama_kategori }}</td>
                <td class="px-6 py-4 text-sm">
                    <a href="{{ route('barang-category.edit', $category->id) }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Edit</a>
                    <form action="{{ route('barang-category.destroy', $category->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                            onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4 text-white dark:text-white">
      {{ $categories->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection