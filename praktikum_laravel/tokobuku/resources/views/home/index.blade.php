@extends('layouts.app')

@section('content')
<div class="m-4">
    <p class="text-4xl text-white dark:text-white font-extrabold">Admin Transaksi</p>

    <!-- User Selection -->
    <div class="mt-4">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Pelanggan</label>
        <select id="user_id" class=" bg-transparent appearance-none w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Pilih Pelanggan</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Book Table -->
    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Select</th>
                    <th class="px-6 py-3">Book Title</th>
                    <th class="px-6 py-3">Author</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Stock</th>
                    <th class="px-6 py-3">Quantity</th>
                </tr>
            </thead>
            <tbody id="bookTableBody">
                @foreach ($books as $book)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <input type="checkbox" data-id="{{ $book->id }}" data-title="{{ $book->judul }}" data-price="{{ $book->harga }}" data-stock="{{$book->stock}}" class="book-checkbox">
                    </td>
                    <td class="px-6 py-4">{{ $book->judul }}</td>
                    <td class="px-6 py-4">{{ $book->penulis }}</td>
                    <td class="px-6 py-4">Rp{{ number_format($book->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $book->stock }}</td>
                    <td class="px-6 py-4">
                        <input type="number" min="1" max="{{ $book->stock }}" class="quantity-input w-16 p-2 text-center rounded-lg border-gray-300" value="1" data-id="{{ $book->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $books->links('vendor.pagination.tailwind') }}
    </div>

    <!--SECTION KERANJANG WAK-->
    <div id="cartSection" class="mt-8 hidden">
        <p class="text-lg font-bold text-white dark:text-white">Keranjang</p>

        <p class="text-lg font-bold text-white dark:text-white">Judul - Quantity - SubTotal</p>
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
        const userIdSelect = document.getElementById('user_id');
        const submitTransaction = document.getElementById('submitTransaction');


        document.querySelectorAll('.book-checkbox').forEach(checkbox => {
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
            const userId = userIdSelect.value;
            if (userId === 'Pilih Pelanggan' || cart.length === 0) {
                alert('Please select a user and add items to the cart.');
                return;
            }
            try {
                console.log("{{ route('transactions.store') }}");
                const response = await fetch("{{ route('transactions.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        user_id: userId,
                        cart
                    })
                });

                if (response.ok) {
                    console.log(await response.json()) 
                    window.location.href = "{{ route('transactions.index') }}";
                } else {
                    alert('Failed to save transaction.');
                }
            } catch (error) {
                console.error(error);
                alert('An error occurred.');
            }
        });

    });
</script>
@endsection