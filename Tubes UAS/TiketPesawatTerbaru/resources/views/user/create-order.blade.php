<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-green-50 flex justify-center items-center h-screen">

    <div class="container mx-auto max-w-lg bg-white p-8 rounded-lg shadow-lg">

        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Form Pemesanan Tiket</h1>
        <form action="{{ route('user.store-order') }}" method="POST">
            @csrf
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="mb-6">
                <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select id="gender" name="gender" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="nationality" class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
                <input type="text" id="nationality" name="nationality" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="mb-6">
                <label for="dob" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" id="dob" name="dob" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" id="phone" name="phone" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <button type="submit" class="w-full py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-500 transition duration-300">
                Pesan Tiket
            </button>

            <div class="mt-6">
            <a href="{{ route('user.tickets.index') }}" 
               class="inline-block w-full px-5 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300 text-center">
                Kembali
            </a>
        </div>
        </form>
    </div>
</body>
</html>