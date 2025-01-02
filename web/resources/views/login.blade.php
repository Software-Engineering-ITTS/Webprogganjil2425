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
        <form method="POST" action="/login" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/3">
            @csrf
            <h1 class="text-center text-2xl font-bold mb-6">Login Pegawai</h1>
            <div class="mb-4">
                <label for="namapegawai" class="block text-sm font-bold mb-2">Nama Pegawai</label>
                <input type="text" name="namapegawai" id="namapegawai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
                <a href="/tambah" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Register
                </a>
            </div>
        </form>
    </div>
</body>
</html>