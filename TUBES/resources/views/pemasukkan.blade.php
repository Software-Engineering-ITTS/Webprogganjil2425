<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 text-gray-800">
    <div class="bg-red-700 text-white p-8 rounded-lg w-full max-w-lg">
        <h1 class=" font-bold mb-6">Form pemasukkan</h1>
        <form action="/laporan" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="Nama_Barang" class="block text-sm font-medium">Nama Barang:</label>
                <input 
                    type="text" 
                    id="Nama_Barang" 
                    name="Nama_Barang" 
                    class="w-full mt-1 px-3 py-2 bg-red-100 text-black border border-red-300 rounded">
            </div>
            <div>
                <label for="Jumlah_Barang" class="block text-sm font-medium">Jumlah Barang:</label>
                <input 
                    type="number" 
                    id="Jumlah_Barang" 
                    name="Jumlah_Barang" 
                    min="1" 
                    class="w-full mt-1 px-3 py-2 bg-red-100 text-black border border-red-300 rounded">
            </div>
            <div>
                <label for="Nominal" class="block text-sm font-medium">Nominal:</label>
                <input 
                    type="number" 
                    id="Nominal" 
                    name="Nominal" 
                    min="0" 
                    class="w-full mt-1 px-3 py-2 bg-red-100 text-black border border-red-300 rounded">
            </div>
            <div class="hidden">
                <input type="text" id="Status" name="Status" value="pemasukkan">
                <input type="text" id="id_admin" name="id_admin" value="1">
            </div>
            <button 
                type="submit" 
                class="w-full py-2 bg-red-800 text-white font-bold rounded hover:bg-black">
                Submit
            </button>
        </form>
    </div>
</body>
</html>
