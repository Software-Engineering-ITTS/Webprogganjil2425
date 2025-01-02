<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Tickets</title>
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
            <h1 class="text-3xl font-semibold text-center py-6 text-gray-800">Daftar Tiket</h1>

            <div class="overflow-x-auto px-4 pb-6">
                <table class="w-full border-collapse table-auto text-sm text-gray-600">
                    <thead>
                        <tr class="bg-green-600 text-white">
                            <th class="p-4 text-left">Maskapai</th>
                            <th class="p-4 text-left">Departure</th>
                            <th class="p-4 text-left">Destinasi</th>
                            <th class="p-4 text-left">Harga</th>
                            <th class="p-4 text-left">Tanggal Penerbangan</th>
                            <th class="p-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="p-3 border-t border-b border-gray-200">{{ $ticket->maskapai }}</td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $ticket->departur }}</td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $ticket->destinasi }}</td>
                            <td class="p-3 border-t border-b border-gray-200">Rp{{ number_format($ticket->harga, 0, ',', '.') }}</td>
                            <td class="p-3 border-t border-b border-gray-200">{{ $ticket->tanggal }}</td>
                            <td class="p-3 border-t border-b border-gray-200 text-center">
                                <a href="{{ route('admin.tickets.edit', $ticket->id) }}" 
                                   class="inline-block px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-300">
                                    Edit
                                </a>
                                <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300"
                                            onclick="return confirm('Are you sure you want to delete this ticket?');">
                                        Hapus
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
