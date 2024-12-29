<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
            <div class="text-white my-5">
                <h1 class="text-3xl text-center">Purchase History</h1>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl mb-11">
        <table class="w-full text-white text-center border border-white">
            <thead class="bg-gray-500">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="">
                        <td class="border border-white">{{ $order->aircraft->name }}</td>
                        <td class="border border-white">{{ $order->quantity }}</td>
                        <td class="border border-white">${{ $order->total_price }}</td>
                        <td class="border border-white">{{ $order->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
