<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 text-blue-900">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <h2 class="text-xl font-bold mt-8">History Data</h2>
        <table class="table-auto bg-white shadow-md rounded mt-4 border-collapse border border-blue-300">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="px-4 py-2 border border-blue-300">Id Pegawai</th>
                    <th class="px-4 py-2 border border-blue-300">Berat Badan</th>
                    <th class="px-4 py-2 border border-blue-300">Tinggi Badan</th>
                    <th class="px-4 py-2 border border-blue-300">Suhu Badan</th>
                    <th class="px-4 py-2 border border-blue-300">Tekanan Darah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kesehatan as $items)
                <tr class="text-center">
                    <td class="px-4 py-2 border border-blue-300">{{ $items->id_pegawai }}</td>
                    <td class="px-4 py-2 border border-blue-300">{{ $items->BeratBadan }}</td>
                    <td class="px-4 py-2 border border-blue-300">{{ $items->TinggiBadan }}</td>
                    <td class="px-4 py-2 border border-blue-300">{{ $items->SuhuBadan }}</td>
                    <td class="px-4 py-2 border border-blue-300">{{ $items->TekananDarah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>