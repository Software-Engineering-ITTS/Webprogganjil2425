@extends('layouts.app')


@section('content')
<div class="m-4 ">
  <p class="text-4xl text-white dark:text-white font-extrabold">Data Transaksi</p>
  <button class=" dark:text-gray-700 dark:bg-white text-white font-bold py-2 px-4 rounded my-4">
    Tambah Data
  </button>
  <div class="relative ">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th hidden scope="col" class="px-6 py-3">
            Id
          </th>
          <th scope="col" class="px-6 py-3">
            Nama
          </th>
          <th scope="col" class="px-6 py-3">
            Email
          </th>

          <th scope="col" class="px-6 py-3">
            Total Harga
          </th>

          <th scope="col" class="px-6 py-3">
            Tanggal Transaksi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($transactions as $key => $data)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <td hidden="px-6 py-4">
            {{ $data->id }}
          </td>
          <td class="px-6 py-4">
            {{ $data->user->name }}
          </td>
          <td class="px-6 py-4">
            {{ $data->user->email }}
          </td>
        
          <td class="px-6 py-4">
            Rp. {{ $data->total_amount_formatted}}
          </td>
          <td class="px-6 py-4">
            {{ $data->created_at_formatted}}
          </td>

          <td class="px-6 py-4">
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <a
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Edit
              </a>
              <!-- Delete Button -->
              <form method="POST" class="inline">
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
      {{ $transactions->links() }}
    </div>
  </div>
</div>
@endsection