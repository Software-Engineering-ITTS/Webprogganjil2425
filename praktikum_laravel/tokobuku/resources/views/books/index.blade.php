@extends('layouts.app')

@section('content')
<div class="m-4 ">
  <p class="text-4xl text-white dark:text-white font-extrabold">Data Buku</p>
  <a href="{{route('books.create')}}">
    <button class=" dark:text-gray-700 dark:bg-white text-white font-bold py-2 px-4 rounded my-4">
      Tambah Data
    </button>
  </a>

  <div class="relative ">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th hidden scope="col" class="px-6 py-3">
            Id
          </th>
          <th scope="col" class="px-6 py-3">
            Judul
          </th>
          <th scope="col" class="px-6 py-3">
            Penulis
          </th>
          <th scope="col" class="px-6 py-3">
            Tahun Terbit
          </th>
          <th scope="col" class="px-6 py-3">
            Stok
          </th>
          <th scope="col" class="px-6 py-3">
            Harga
          </th>
          <th scope="col" class="px-6 py-3">
            Cover
          </th>

          <th scope="col" class="px-6 py-3">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($books as $key => $data)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td hidden="px-6 py-4">
            {{ $data->id }}
          </td>
          <td class="px-6 py-4">
            {{ $data->judul }}
          </td>
          <td class="px-6 py-4">
            {{ $data->penulis }}
          </td>
          <td class="px-6 py-4">
            {{ $data->tahun_terbit }}
          </td>
          <td class="px-6 py-4">
            {{ $data->stock }}
          </td>
          <td class="px-6 py-4">
            {{ $data->harga }}
          </td>
          <td class="px-6 py-4">
            <img width="50" src="{{ asset('storage/uploads/'.$data->cover) }}" />
          </td>
          <td class="px-6 py-4">
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <a
                href="{{ route('book.edit', $data->id) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Edit
              </a>
              <!-- Delete Button -->
              <form method="POST" class="inline" action="{{ route('book.destroy', $data->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                  onclick="return confirm('Are you sure you want to delete this?')">
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
      {{ $books->links('vendor.pagination.tailwind') }}
    </div>
  </div>
</div>
@endsection