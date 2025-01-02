<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-t from-[#14274E] to-[#D4E9F3] flex items-center justify-center min-h-screen">
    <form method="POST" action="/barang" class="bg-[#F1F6F9] shadow-md rounded px-8 pt-6 pb-8 w-full max-w-md">
        @csrf
        <h1 class="text-2xl font-bold mb-4 text-[#14274E] text-center">Form Tambah Barang</h1>
        <div class="mb-4">
            <label for="NamaBarang" class="block text-[#14274E] text-sm font-bold mb-2">Nama Barang</label>
            <input type="text" name="NamaBarang" id="NamaBarang" required class="shadow appearance-none border rounded w-full py-2 px-3 text-[#14274E] bg-[#F1F6F9] leading-tight focus:outline-none focus:ring focus:border-[#14274E]">
        </div>
        <div class="mb-4">
            <label for="Stock" class="block text-[#14274E] text-sm font-bold mb-2">Stock</label>
            <input type="text" name="Stock" id="Stock" required class="shadow appearance-none border rounded w-full py-2 px-3 text-[#14274E] bg-[#F1F6F9] leading-tight focus:outline-none focus:ring focus:border-[#14274E]">
        </div>
        <input type="text" name="id_user" id="id_user" value="1" hidden>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-[#14274E] hover:bg-[#394867] text-[#F1F6F9] font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-[#14274E]">
                Submit
            </button>
        </div>
    </form>
</body>
</html>
