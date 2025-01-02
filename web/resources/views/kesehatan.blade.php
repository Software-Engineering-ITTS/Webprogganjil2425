<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Check Kesehatan Bulanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-100 text-blue-900">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-2/3">
            <h1 class="text-center text-2xl font-bold mb-6">Form Check Kesehatan Bulanan</h1>
            @foreach ($data as $items)
                <form method="POST" action="{{ route('kesehatan.store', $items->id) }}">
                    @csrf
                    <textarea class="w-full border border-gray-300 rounded p-2 mb-4 text-gray-700 focus:outline-none focus:shadow-outline" rows="4" readonly>Form ini merupakan form untuk mendata semua data karyawan agar perusaahan mendapatkan data dari form ini yang dapat di gunakan jikalau ada suatu kejadian yang membutuhkan semua data ini</textarea>

                    <div class="mb-4">
                        <h2 class="text-lg font-bold mb-2">Pendataan</h2>
                        <input type="hidden" name="id_pegawai" value="{{ $items->id }}">

                        <label for="BeratBadan" class="block text-sm font-bold mb-2">Berat Badan</label>
                        <input type="text" name="BeratBadan" id="BeratBadan" value="kg" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                        <label for="TinggiBadan" class="block text-sm font-bold mt-4 mb-2">Tinggi Badan</label>
                        <input type="text" name="TinggiBadan" id="TinggiBadan" value="cm" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                        <label for="TekananDarah" class="block text-sm font-bold mt-4 mb-2">Tekanan Darah (contoh: 120/86)</label>
                        <input type="text" name="TekananDarah" id="TekananDarah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                        <label for="SuhuBadan" class="block text-sm font-bold mt-4 mb-2">Suhu Badan</label>
                        <input type="text" name="SuhuBadan" id="SuhuBadan" value="°C" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                        <label for="keluhan" class="block text-sm font-bold mt-4 mb-2">Keluhan yang Dialami</label>
                        <input type="text" name="keluhan" id="keluhan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                        <button type="submit" class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Kirim
                        </button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</body>

</html>
