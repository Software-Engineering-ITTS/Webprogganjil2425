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
          
          <td hidden class="px-6 py-4">
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
            <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 show-transaction-btn" data-id="{{ $data->id }}">
              Show Detail
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-4 text-white dark:text-white">
      {{ $transactions->links('vendor.pagination.tailwind') }}
    </div>

    <!-- MODAL -->
    <div id="transactionModal" class="fixed inset-0 bg-black bg-opacity-50 flex hidden justify-center items-center ">
      <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-1/2 justify-center content-center ">
        <div class="flex justify-between items-center">
          <h2 class="text-xl font-bold text-gray-800 dark:text-white">Detail Transaksi</h2>
          <button id="closeModal" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300">&times;</button>
        </div>
        <div id="transactionDetails" class="mt-4 text-gray-800 dark:text-white">
          <!-- TEMPAT UNTUK NARUH TRANSAKSI DETAIL NANTI -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SKRIP BUAT NAMPILIN MODAL WLEAOKAKW -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('transactionModal');
    const closeModal = document.getElementById('closeModal');
    const transactionDetails = document.getElementById('transactionDetails');

    document.querySelectorAll('.show-transaction-btn').forEach(button => {
      button.addEventListener('click', async () => {
        const transactionId = button.getAttribute('data-id');

        try {
          const response = await fetch(`/transactions/${transactionId}`);
          const data = await response.json();

          if (response.ok) {
            transactionDetails.innerHTML = `
                            <p><strong>Transaction ID:</strong> ${data.id}</p>
                            <p><strong>Customer:</strong> ${data.user.name}</p>
                            <p><strong>Total Amount:</strong> Rp${new Intl.NumberFormat('id-ID').format(data.total_amount)}</p>
                            <p><strong>Date:</strong> ${new Date(data.created_at).toLocaleDateString('id-ID')}</p>
                            <hr class="my-4">
                            <p><strong>Books:</strong></p>
                            <ul>
                                ${data.transaction_lists.map(item => `
                                    <li>${item.book.judul} - ${item.quantity} x Rp${new Intl.NumberFormat('id-ID').format(item.book.harga)} = Rp${new Intl.NumberFormat('id-ID').format(item.total_price)}</li>
                                `).join('')}
                            </ul>
                        `;
            modal.classList.remove('hidden');
          } else {
            alert('Failed to load transaction details.');
          }
        } catch (error) {
          console.error(error);
          alert('An error occurred.');
        }
      });
    });

    closeModal.addEventListener('click', () => {
      modal.classList.add('hidden');
    });
  });
</script>
@endsection