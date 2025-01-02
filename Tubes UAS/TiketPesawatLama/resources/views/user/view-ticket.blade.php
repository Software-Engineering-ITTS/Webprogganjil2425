<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan Tiket</title>
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

        @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 border border-green-300 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Riwayat Pemesanan Tiket</h1>

            @if ($orders->count() > 0)
                @foreach ($orders as $order)
                    <div class="mb-6">
                        <h2 class="text-xl font-medium text-gray-800">{{ $order->ticket->maskapai }}</h2>
                        <p><strong>Harga:</strong> Rp{{ number_format($order->ticket->harga, 0, ',', '.') }}</p>
                        <p><strong>Tanggal Keberangkatan:</strong> {{ \Carbon\Carbon::parse($order->ticket->tanggal)->format('d F Y') }}</p>
                        <p><strong>Nomor Telepon Pemesan:</strong> {{ $order->phone }}</p>
                        <p><strong>Status Check-In:</strong> {{ ucfirst($order->check_in_status) }}</p>
                        @if ($order->check_in_status !== 'checked_in')
                        <form action="{{ route('user.orders.checkin', $order->id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">
                                Check In
                            </button>
                        </form>
                        @else
                        <p class="text-green-500 mt-4">Anda sudah check-in!</p>
                        @endif
                    </div>
                @endforeach
            @else
                <p class="text-gray-600">Anda belum memiliki tiket yang dipesan.</p>
            @endif
        </div>
    </div>
</body>
</html>
