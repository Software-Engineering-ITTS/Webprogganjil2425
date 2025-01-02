<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-sky-900 min-h-screen p-6">
    <div class="container mx-auto">

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-sky-500 shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-semibold text-gray-1000 mb-6">Pembelian Buku</h2>
            <form action="{{ route('bookss.beli', $bookss->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block text-gray-1000 font-medium">Judul Buku</label>
                    <input type="text" id="judul" value="{{ $bookss->Judul }}" class=" p-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                </div>
                <div class="mb-4">
                    <label for="penulis" class="block text-gray-1000 font-medium">Penulis</label>
                    <input type="text" id="penulis" value="{{ $bookss->Penulis }}" class=" p-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-gray-1000 font-medium">Harga</label>
                    <input type="text" id="harga" value="Rp{{ number_format($bookss->Harga, 0, ',', '.') }}" class=" p-3 border border-gray-300 rounded-lg bg-gray-100" readonly>
                </div>
                <div class="mb-4">
                    <label for="jumlah" class="block text-gray-1000 font-medium">Jumlah Pembelian</label>
                    <input type="number" name="jumlah" id="jumlah" class=" p-3 border border-gray-300 rounded-lg" placeholder="Masukkan jumlah pembelian" min="1" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                    Beli
                </button>
            </form>
        </div>
    </div>
</body>
</html>
