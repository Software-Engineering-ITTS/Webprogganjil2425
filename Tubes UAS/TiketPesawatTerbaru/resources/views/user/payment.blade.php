<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-green-50 py-12">

    <div class="container mx-auto max-w-md bg-white p-8 rounded-xl shadow-lg">

        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Pembayaran Tiket</h1>

        <form action="{{ route('user.payment.process', $order->id) }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="card_number" class="block text-sm font-medium text-gray-700">Nomor Kartu Kredit</label>
                <input type="text" id="card_number" name="card_number" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Masukkan nomor kartu kredit" required>
            </div>

            <div class="mb-6">
                <label for="card_expiry" class="block text-sm font-medium text-gray-700">Tanggal Kedaluwarsa</label>
                <input type="text" id="card_expiry" name="card_expiry" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="MM/YY" required>
            </div>

            <div class="mb-6">
                <label for="card_cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                <input type="text" id="card_cvc" name="card_cvc" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Masukkan CVC" required>
            </div>

            <button type="submit" class="w-full py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-300 focus:ring-4 focus:ring-green-500">
                Bayar Sekarang
            </button>
        </form>

        <div class="mt-6">
            <a href="{{ route('user.tickets.history') }}" 
               class="inline-block w-full px-5 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300 text-center">
                Kembali ke Riwayat Pemesanan
            </a>
        </div>
    </div>
</body>
</html>
