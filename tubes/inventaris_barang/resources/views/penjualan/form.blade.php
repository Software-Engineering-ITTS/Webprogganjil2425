@extends('layouts.app')

@section('content')
<div class="m-4">
    <p class="text-4xl text-white dark:text-white font-extrabold mb-4">Penjualan</p>

    <div class="mb-5">
            <label for="pelanggan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pelanggan</label>
            <input
                type="text"
                id="pelanggan"
                name="pelanggan"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nama Pelanggan"
                required />
        </div>

    <!-- Barang Table -->
    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Select</th>
                    <th class="px-6 py-3">Kode Barang</th>
                    <th class="px-6 py-3">Nama Barang</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Stock</th>
                    <th class="px-6 py-3">Quantity</th>
                </tr>
            </thead>
            <tbody id="barangTableBody">
                @foreach ($barangs as $barang)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <input type="checkbox" data-id="{{ $barang->id }}" data-title="{{ $barang->nama_barang }}" data-price="{{ $barang->harga }}" data-stock="{{$barang->stock}}" class="barang-checkbox">
                    </td>
                    <td class="px-6 py-4">{{ $barang->kode_barang }}</td>
                    <td class="px-6 py-4">{{ $barang->nama_barang }}</td>
                    <td class="px-6 py-4">Rp{{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $barang->stock }}</td>
                    <td class="px-6 py-4">
                        <input type="number" min="1" max="{{ $barang->stock }}" class="quantity-input w-16 p-2 text-center rounded-lg border-gray-300" value="1" data-id="{{ $barang->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $barangs->links('vendor.pagination.tailwind') }}
    </div>

    <!--SECTION KERANJANG WAK-->
    <div id="cartSection" class="mt-8 hidden">
        <p class="text-lg font-bold text-white dark:text-white">Keranjang</p>

        <p class="text-lg font-bold text-white dark:text-white">Barang - Quantity - SubTotal</p>
        <ul id="cartList" class="list-disc pl-5 text-white">

        </ul>

        <button id="submitTransaction" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Simpan Transaksi
        </button>
    </div>
</div>

<!-- Script to interact with the keranjang -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cart = [];
        const cartSection = document.getElementById('cartSection');
        const cartList = document.getElementById('cartList');
        const pelanggan = document.getElementById('pelanggan');
        const submitTransaction = document.getElementById('submitTransaction');


        document.querySelectorAll('.barang-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', (e) => {
                const id = e.target.dataset.id;
                const title = e.target.dataset.title;
                const price = e.target.dataset.price;
                const stock = e.target.dataset.stock;
                const quantityInput = document.querySelector(`.quantity-input[data-id="${id}"]`);
                const quantity = quantityInput.value || 1;

                if (e.target.checked) {

                    if (parseInt(quantity) > parseInt(stock)) {
                        alert("Jumlah Melebihi Stock");
                        return
                    }

                    cart.push({
                        id,
                        title,
                        price,
                        quantity
                    });

                    quantityInput.disabled = true;
                } else {
                    quantityInput.disabled = false;
                    const index = cart.findIndex(item => item.id === id);
                    if (index !== -1) cart.splice(index, 1);

                }

                updateCart();
            });
        });

        function updateCart() {
            cartSection.classList.toggle('hidden', cart.length === 0);

            let hargaInRupiah = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            });

            cartList.innerHTML = cart.map(item => `<li>${item.title} - ${item.quantity} - ${hargaInRupiah.format( item.price * item.quantity)}</li>`).join('');
        }


        submitTransaction.addEventListener('click', async () => {
            const namaPelanggan = pelanggan.value;
            if (namaPelanggan === '' || cart.length === 0) {
                alert('Please insert pelanggan and add items to the cart.');
                return;
            }
            try {
                console.log("{{ route('transaksi.store') }}");
                const response = await fetch("{{ route('transaksi.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        pelanggan: namaPelanggan,
                        cart
                    })
                });

                if (response.ok) {
                    console.log(await response.json())
                    window.location.href = "{{ route('transaksi.index') }}";
                } else {
                    alert('Failed to save transaction ' + response.message);
                }
            } catch (error) {
                console.error(error);
                alert('An error occurred.');
            }
        });

    });
</script>
@endsection