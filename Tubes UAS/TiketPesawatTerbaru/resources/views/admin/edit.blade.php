<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 py-8">
    <div class="container mx-auto px-6">
        <div class="mb-6">
            <a href="{{ route('admin.tickets.index') }}" 
               class="inline-block px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">
                Kembali
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Edit Tiket</h1>
            <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="maskapai" class="block text-gray-700 font-medium mb-2">Maskapai</label>
                    <input type="text" id="maskapai" name="maskapai" value="{{ $ticket->maskapai }}" 
                           class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="departur" class="block text-gray-700 font-medium mb-2">Departure</label>
                    <input type="text" id="departur" name="departur" value="{{ $ticket->departur }}"
                           class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="destinasi" class="block text-gray-700 font-medium mb-2">Destinasi</label>
                    <input type="text" id="destinasi" name="destinasi" value="{{ $ticket->destinasi }}"
                           class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="harga" class="block text-gray-700 font-medium mb-2">Harga</label>
                    <input type="number" id="harga" name="harga" value="{{ $ticket->harga }}"
                           class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="tanggal" class="block text-gray-700 font-medium mb-2">Tanggal Penerbangan</label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ $ticket->tanggal }}"
                           class="w-full border-2 border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="text-center">
                    <button type="submit" 
                            class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
