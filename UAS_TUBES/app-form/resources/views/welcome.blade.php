<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Aset Perusahaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-600 min-h-screen">
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">PT. SUGENG SIDOMUNDUR</h1>
            <div>
                <span>Welcome, <strong>admin</strong></span>
                <a href="/login" class="bg-red-500 text-white px-2 py-1 rounded-lg text-sm hover:bg-red-600">Logout</a>
            </div>
        </div>
    </header>

    <div class="container mx-auto py-6">
        <div class="flex">
            <nav class="w-1/4 bg-gray-400 shadow-md rounded-lg p-4">
            <ul>
                    <li class="mb-2">
                        <a href="/welcome" class="text-gray-700 font-medium hover:text-blue-600">Home</a>
                    </li>
                    <li class="mb-2">
                        <a href="/app" class="text-gray-700 font-medium hover:text-blue-600">Data Aset</a>
                    </li>
                    <li class="mb-2">
                        <a href="/lihatlokasi" class="text-gray-700 font-medium hover:text-blue-600">Data Lokasi Aset</a>
                    </li>
                    <li class="mb-2">
                        <a href="/pemeliharaan" class="text-gray-700 font-medium hover:text-blue-600">Pemeliharaan</a>
                    </li>
                    <li class="mb-2">
                        <a href="/viewpemeliharaan" class="text-gray-700 font-medium hover:text-blue-600">Data Pemeliharaan Aset</a>
                    </li>
                    <li class="mb-2">
                        <a href="/lokasi" class="text-gray-700 font-medium hover:text-blue-600">Lokasi</a>
                    </li>
                </ul>
            </nav>
            <main class="w-3/4 ml-4">
                <div class="bg-gray-400 p-4 rounded-lg shadow-md">
                    <h1 class="text-gray-700 font-medium">WELCOME, ADMIN!</h1>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
