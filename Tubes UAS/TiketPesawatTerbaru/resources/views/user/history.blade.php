<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-green-50 py-8">

    <div class="container mx-auto px-6">
        <div class="mb-6">
            <a href="{{ route('user.dashboard') }}" 
               class="inline-block px-5 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
                ← Kembali ke Dashboard
            </a>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Riwayat Pemesanan</h1>

            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse table-auto">
                    <thead>
                        <tr class="bg-green-600 text-white">
                            <th class="p-3 border border-gray-200 text-left">User</th>
                            <th class="p-3 border border-gray-200 text-left">Gender</th>
                            <th class="p-3 border border-gray-200 text-left">Kewarganegaraan</th>
                            <th class="p-3 border border-gray-200 text-left">No Telepon</th>
                            <th class="p-3 border border-gray-200 text-left">Maskapai</th>
                            <th class="p-3 border border-gray-200 text-left">Destinasi</th>
                            <th class="p-3 border border-gray-200 text-left">Harga</th>
                            <th class="p-3 border border-gray-200 text-left">Tanggal Pemesanan</th>
                            <th class="p-3 border border-gray-200 text-left">Status Pembayaran</th>
                            <th class="p-3 border border-gray-200 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="p-3 border border-gray-200">{{ $order->name }}</td>
                            <td class="p-3 border border-gray-200">{{ $order->gender }}</td>
                            <td class="p-3 border border-gray-200">{{ $order->nationality }}</td>
                            <td class="p-3 border border-gray-200">{{ $order->phone }}</td>
                            <td class="p-3 border border-gray-200">{{ $order->ticket->maskapai }}</td>
                            <td class="p-3 border border-gray-200">{{ $order->ticket->destinasi }}</td>
                            <td class="p-3 border border-gray-200">Rp{{ number_format($order->ticket->harga, 0, ',', '.') }}</td>
                            <td class="p-3 border border-gray-200">{{ \Carbon\Carbon::parse($order->order_date)->format('d F Y') }}</td>
                            <td class="p-3 border border-gray-200">{{ ucfirst($order->payment_status) }}</td>
                            <td class="p-3 border border-gray-200 text-center">
                                <a href="{{ route('user.view-ticket', $order->id) }}" 
                                   class="text-blue-500 hover:text-blue-600 transition duration-300">Lihat Tiket</a>
                                @if ($order->payment_status === 'pending')
                                    | <a href="{{ route('user.payment', $order->id) }}" 
                                         class="text-green-500 hover:text-green-600 transition duration-300">Bayar</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
