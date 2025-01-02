<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-t from-[#14274E] to-[#D4E9F3] flex items-center justify-center min-h-screen">
    <form method="POST" action="/barang/{{ $data->id }}/beli" class="bg-[#F1F6F9] shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
        @csrf
        <h1 class="text-2xl font-bold mb-4 text-[#14274E]">Ambil Barang</h1>
        <div class="mb-4">
            <p class="text-[#14274E]">Nama Barang: <span class="font-semibold">{{ $data->NamaBarang }}</span></p>
        </div>
        <div class="mb-4">
            <p class="text-[#14274E]">Stock: <span class="font-semibold">{{ $data->Stock }}</span></p>
        </div>
        <div class="mb-4">
            <label for="jumlah" class="block text-[#14274E] text-sm font-bold mb-2">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" placeholder="Jumlah" min="1" required class="shadow appearance-none border rounded w-full py-2 px-3 text-[#14274E] bg-[#F1F6F9] leading-tight focus:outline-none focus:ring focus:border-[#14274E]">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                Ambil
            </button>
        </div>
    </form>
</body>
</html>
