<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Event List</h2>

        <form action="/event" method="POST">
            @csrf
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">Nama Event</th>
                            <th class="px-6 py-3 text-left">Tanggal Event</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @foreach ($data as $items)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $items->namaevent }}</td>
                        <td class="px-6 py-3">{{ $items->tanggalevent }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-center">
                <a href='/tambahevent' class="inline-block bg-blue-500 text-white font-semibold px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300 mr-4">
                    Tambah Event
                </a>
                <a href='/riwayat' class="inline-block bg-green-500 text-white font-semibold px-6 py-2 rounded-md hover:bg-green-600 transition duration-300">
                    Riwayat
                </a>
            </div>
        </form>
    </div>

</body>
</html>
