<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-100 text-blue-900">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/3">
            <h1 class="text-center text-2xl font-bold mb-6">Tambah Pegawai Baru</h1>
            <form method="POST" action="/pegawai">
                @csrf
                <div class="mb-4">
                    <label for="namapegawai" class="block text-sm font-bold mb-2">Nama Pegawai</label>
                    <input type="text" name="namapegawai" id="namapegawai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="namalengkap" class="block text-sm font-bold mb-2">Nama Lengkap</label>
                    <input type="text" name="namalengkap" id="namalengkap" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <p class="block text-sm font-bold mb-2">Jenis Kelamin</p>
                    <label class="inline-flex items-center">
                        <input type="radio" name="kelamin" id="kelamin" value="pria" class="form-radio text-blue-600">
                        <span class="ml-2">Pria</span>
                    </label>
                    <label class="inline-flex items-center ml-4">
                        <input type="radio" name="kelamin" id="kelamin" value="wanita" class="form-radio text-blue-600">
                        <span class="ml-2">Wanita</span>
                    </label>
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-bold mb-2">Alamat Rumah</label>
                    <input type="text" name="alamat" id="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="penyakit" class="block text-sm font-bold mb-2">Penyakit Akut yang Diderita</label>
                    <input type="text" name="penyakit" id="penyakit" value="tidak ada" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="Goldarah" class="block text-sm font-bold mb-2">Golongan Darah</label>
                    <select name="Goldarah" id="Goldarah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
