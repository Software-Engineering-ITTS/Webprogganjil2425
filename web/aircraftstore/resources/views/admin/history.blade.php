<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>User Purchase History</title>
</head>

<body class="min-h-screen bg-black text-white">
    <nav class="flex justify-center bg-gray-900 p-4">
        <div class="mx-3">
            <a href="/admin/dashboard" class="hover:bg-gray-700 p-2 rounded-md">Dashboard</a>
        </div>
        <div class="mx-3">
            <a href="/admin/addproduct" class="hover:bg-gray-700 p-2 rounded-md">Add Aircraft</a>
        </div>
        <div class="mx-3">
            <a href="/admin/history" class="hover:bg-gray-700 p-2 rounded-md">History</a>
        </div>
        <div class="mx-3">
            <a href="/admin/listproduct" class="hover:bg-gray-700 p-2 rounded-md">List Aircraft</a>
        </div>
        <div class="mx-3">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <a href="/" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="hover:bg-red-700 p-2 rounded-md">{{ __('Log Out') }}</a>
            </form>
        </div>
    </nav>

    <header>
        <div class="p-3 my-7">
            <h1 class="text-center text-3xl">User Purchase History</h1>
        </div>
    </header>

    <main>
        @if (isset($orders) && $orders->isNotEmpty())
            <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
                <table class="w-full text-left bg-gray-800 rounded-xl overflow-hidden">
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
            </div>
        @else
            <p>No orders found.</p>
        @endif
    </main>

    <footer>
        {{-- Footer Content --}}
    </footer>
</body>

</html>
