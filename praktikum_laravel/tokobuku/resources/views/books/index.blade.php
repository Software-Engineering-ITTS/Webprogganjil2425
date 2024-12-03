@extends('layouts.app')


@section('content')
<div class="m-4">
  <p class="text-4xl font-extrabold">Data Buku</p>



  <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
            Cover
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td hidden="px-6 py-4">

          </td>
          <td class="px-6 py-4">

          </td>
          <td class="px-6 py-4">

          </td>
          <td class="px-6 py-4">

          </td>
          <td class="px-6 py-4">

          </td>

          <td class="px-6 py-4">

          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
@endsection