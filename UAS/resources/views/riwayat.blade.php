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
                            <th class="px-4 py-2 text-left">Id Event</th>
                            <th class="px-4 py-2 text-left">Nama Lengkap</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @foreach ($data as $items)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $items->id_event }}</td>
                        <td class="px-4 py-2">{{ $items->datadiri }}</td>
                        <td class="px-4 py-2">{{ $items->hadir }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>

</body>
</html>
