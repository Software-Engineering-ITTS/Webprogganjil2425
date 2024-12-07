<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <a href="/" class="text-blue-500 underline">List Buku</a>
        
        <h2 class="text-2xl font    -bold mt-6 mb-4">Show Data</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2 border">IDBuku</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">NomorTelepon</th>
                 
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $items->toko_id }}</td>
                    <td class="px-4 py-2 border">{{ $items->Nama }}</td>
                    <td class="px-4 py-2 border">{{ $items->NomorTelepon }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
