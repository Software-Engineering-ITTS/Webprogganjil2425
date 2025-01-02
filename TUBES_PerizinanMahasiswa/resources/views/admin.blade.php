<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Form Approval</title>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col bg-gradient-to-t from-blue-500 to-white h-64 w-full">
    <div class="bg-blue-500">
        <h1 class="text-3xl font-bold mb-6 text-center sticky top-0">From Approval</h1>
    </div>
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Approval List</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full table-auto border-collapse">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">NIM</th>
                        <th class="px-4 py-2 text-left">Alamat</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Tempat</th>
                        <th class="px-4 py-2 text-left">Kegiatan</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($listPerizinan as $a)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $a->nama }}</td>
                        <td class="px-4 py-2">{{ $a->nim }}</td>
                        <td class="px-4 py-2">{{ $a->alamat }}</td>
                        <td class="px-4 py-2">{{ $a->tanggal }}</td>
                        <td class="px-4 py-2">{{ $a->tempat }}</td>
                        <td class="px-4 py-2">{{ $a->kegiatan }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="/approveperizinan/{{ $a->idPerizinan }}" 
                                class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 transition">Approve</a>
                            <a href="/declineperizinan/{{ $a->idPerizinan }}" 
                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">Decline</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-6">
            <a href="/logout" 
                class="text-blue-700 hover:underline text-lg font-semibold">Logout</a>
        </div>
    </div>
</body>
</html>
