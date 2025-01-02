<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md">
            <h1 class="text-2xl font-bold mb-5 text-green-700 text-center">Edit Karyawan</h1>

            <form action="{{ route('karyawan.update',$karyawans->id) }}" method="POST" class="bg-white p-8 rounded shadow">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama" class="block text-green-700">Nama:</label>
                    <input type="text" name="nama" id="nama" value="{{ $karyawans->nama }}" required class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200">
                </div>
                <div class="mb-4">
                    <label for="jabatan" class="block text-green-700">Jabatan:</label>
                    <input type="text" name="jabatan" id="jabatan" value="{{ $karyawans->jabatan }}" required class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200">
                </div>
                <div class="mb-4">
                    <label for="gaji_pokok" class="block text-green-700">Gaji Pokok:</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ $karyawans->gaji_pokok }}" required class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200">
                </div>
                <div class="mb-4">
                    <label for="tunjangan" class="block text-green-700">Tunjangan:</label>
                    <input type="number" name="tunjangan" id="tunjangan" value="{{ $karyawans->tunjangan }}" class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring focus:ring-green-200">
                </div>
                <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Update</button>
            </form>
        </div>
    </div>
</body>
</html>