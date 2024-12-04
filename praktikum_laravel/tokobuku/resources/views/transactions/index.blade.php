@extends('layouts.app')


@section('content')
<div class="m-4 ">
  <p class="text-4xl text-white dark:text-white font-extrabold">Data Transaksi</p>

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
            <!-- TODO BUTTON SHOW DETAILS -->
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-4 text-white dark:text-white">
      {{ $transactions->links('vendor.pagination.tailwind') }}
    </div>
  </div>
</div>
@endsection