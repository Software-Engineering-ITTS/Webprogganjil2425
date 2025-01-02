<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Records</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-green-50 py-8">

    <div class="container mx-auto px-6">

        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}" 
               class="inline-block px-5 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">
                Kembali ke Dashboard
            </a>
        </div>

        @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 border border-green-300 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <h1 class="text-3xl font-semibold text-center py-6 text-gray-800">Riwayat Transaksi</h1>

            <div class="overflow-x-auto px-4 pb-6">
                <table class="w-full border-collapse table-auto text-sm text-gray-600">
                    <thead>
                        <tr class="bg-green-600 text-white">
                            <th class="p-4 text-left">User</th>
                            <th class="p-4 text-left">Gender</th>
                            <th class="p-4 text-left">Kewarganegaraan</th>
                            <th class="p-4 text-left">Destinasi</th>
                            <th class="p-4 text-left">No Handphone</th>
                            <th class="p-4 text-left">Maskapai</th>
                            <th class="p-4 text-left">Harga</th>
                            <th class="p-4 text-left">Status Pembayaran</th>
                            <th class="p-4 text-left">Tanggal Pemesanan</th>
                            <th class="p-4 text-left">Tanggal Pembayaran</th>
                            <th class="p-4 text-left">Status Check-In</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="p-3 border-t border-b border-gray-200">{{ $transaction->name }}</td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $transaction->gender }}</td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $transaction->nationality }}</td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $transaction->ticket->destinasi }}</td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $transaction->phone }}</td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $transaction->ticket->maskapai }}</td>
                            <td class="p-3 border-t border-b border-gray-200">Rp{{ number_format($transaction->ticket->harga, 0, ',', '.') }}</td>
                            <td class="p-3 border-t border-b border-gray-200">
                                <span class="px-3 py-1 rounded {{ $transaction->payment_status == 'paid' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white' }}">
                                    {{ ucfirst($transaction->payment_status) }}
                                </span>
                            </td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $transaction->order_date }}</td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $transaction->payment_date ?? '-' }}</td>
                            <td class="p-3 border-t border-b border-gray-200">
                                <span class="px-3 py-1 rounded {{ $transaction->check_in_status == 'checked_in' ? 'bg-blue-500 text-white' : 'bg-gray-500 text-white' }}">
                                    {{ $transaction->check_in_status == 'checked_in' ? 'Checked In' : 'Not Checked In' }}
                                </span>
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
