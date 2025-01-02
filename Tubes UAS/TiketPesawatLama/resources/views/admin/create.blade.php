<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 flex justify-center items-center h-screen">

    <div class="mb-6 absolute top-6 left-6">
        <a href="{{ route('admin.dashboard') }}" 
           class="inline-block px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">
            Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Buat Tiket Baru</h2>

        <form action="{{ route('admin.tickets.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="maskapai" class="block text-gray-700 font-medium">Maskapai</label>
                <input type="text" name="maskapai" id="maskapai" class="w-full px-4 py-3 mt-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="departur" class="block text-gray-700 font-medium">Departure</label>
                <input type="text" name="departur" id="departur" class="w-full px-4 py-3 mt-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="destinasi" class="block text-gray-700 font-medium">Destinasi</label>
                <input type="text" name="destinasi" id="destinasi" class="w-full px-4 py-3 mt-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="harga" class="block text-gray-700 font-medium">Harga</label>
                <input type="number" name="harga" id="harga" class="w-full px-4 py-3 mt-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="tanggal" class="block text-gray-700 font-medium">Tanggal Penerbangan</label>
                <input type="date" name="tanggal" id="tanggal" class="w-full px-4 py-3 mt-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                Buat Tiket
            </button>
        </form>
    </div>

</body>
</html>
