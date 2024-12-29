<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
            <div class="text-white my-5">
                <h1 class="text-3xl text-center">Purchase History</h1>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl mb-11">
        @if (isset($orders) && $orders->isNotEmpty())
            <table class="w-full text-center bg-gray-800 rounded-xl overflow-hidden">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="p-4">Order ID</th>
                        <th class="p-4">Customer Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Aircraft</th>
                        <th class="p-4">Quantity</th>
                        <th class="p-4">Total Price</th>
                        <th class="p-4">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-t border-gray-700">
                            <td class="p-4">{{ $order->id }}</td>
                            <td class="p-4">{{ $order->customer->fullname }}</td>
                            <td class="p-4">{{ $order->customer->user->email }}</td>
                            <td class="p-4">{{ $order->aircraft->name }}</td>
                            <td class="p-4">{{ $order->quantity }}</td>
                            <td class="p-4">{{ $order->total_price }}</td>
                            <td class="p-4">{{ $order->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No orders found.</p>
        @endif
    </div>
</x-app-layout>
