<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-t from-[#14274E] to-[#D4E9F3] p-6">
    <h2 class="text-2xl font-bold mb-6 text-center text-[#14274E]">DATA BARANG TB. PUTRA MANDIRI</h2>
    <a href="/tambahbarang">
        <button class="bg-[#14274E] hover:bg-[#394867] text-white font-bold py-2 px-4 rounded mb-4">Tambah Barang</button>
    </a>
    <table class="table-auto border-collapse border border-gray-300 w-full mt-4 bg-[#F1F6F9]">
        <thead>
            <tr class="bg-[#F1F6F9]">
                <th class="border border-gray-300 px-4 py-2 text-[#14274E]">ID</th>
                <th class="border border-gray-300 px-4 py-2 text-[#14274E]">Nama Barang</th>
                <th class="border border-gray-300 px-4 py-2 text-[#14274E]">Stock</th>
                <th class="border border-gray-300 px-4 py-2 text-[#14274E]">Ambil</th>
                <th class="border border-gray-300 px-4 py-2 text-[#14274E]">Restock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $items)
            <tr class="@if ($items->Stock < 10) bg-red-100 text-red-800 @endif">
                <td class="border border-gray-300 px-4 py-2 text-[#14274E]">{{ $items->id }}</td>
                <td class="border border-gray-300 px-4 py-2 text-[#14274E]">{{ $items->NamaBarang }}</td>
                <td class="border border-gray-300 px-4 py-2 text-[#14274E]">{{ $items->Stock }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="/barang/{{ $items->id }}/edit">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Ambil</button>
                    </a>
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="/barang/{{ $items->id }}/editing">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">Restock</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

