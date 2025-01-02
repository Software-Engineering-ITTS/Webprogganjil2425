<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Tickets</title>
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
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Daftar Tiket Tersedia</h1>

            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse table-auto">
                    <thead>
                        <tr class="bg-green-600 text-white">
                            <th class="p-3 border border-gray-200 text-left">Maskapai</th>
                            <th class="p-3 border border-gray-200 text-left">Departure</th>
                            <th class="p-3 border border-gray-200 text-left">Destinasi</th>
                            <th class="p-3 border border-gray-200 text-left">Harga</th>
                            <th class="p-3 border border-gray-200 text-left">Tanggal Penerbangan</th>
                            <th class="p-3 border border-gray-200 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="p-3 border border-gray-200">{{ $ticket->maskapai }}</td>
                            <td class="p-3 border border-gray-200">{{ $ticket->departur }}</td>
                            <td class="p-3 border border-gray-200">{{ $ticket->destinasi }}</td>
                            <td class="p-3 border border-gray-200">Rp{{ number_format($ticket->harga, 0, ',', '.') }}</td>
                            <td class="p-3 border border-gray-200">{{ \Carbon\Carbon::parse($ticket->tanggal)->format('d F Y') }}</td>
                            <td class="p-3 border border-gray-200 text-center">
                                <form action="{{ route('user.create-order', $ticket->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="py-2 px-6 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">
                                        Order
                                    </button>
                                </form>
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
