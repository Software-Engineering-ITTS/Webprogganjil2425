<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-300 flex justify-center items-center h-screen">

    <div class="bg-white p-10 rounded-xl shadow-xl text-center w-full max-w-sm">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-6">SansFly</h1>
        <p class="text-gray-600 mb-8 text-lg">Silahkan Login Sesuai Pengguna!</p>

        <a href="{{ url('admin/login') }}" class="block w-full mb-4">
            <button class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg flex items-center justify-center gap-3 hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m0 0a5 5 0 015-5h2a5 5 0 015 5v4M8 3a5 5 0 00-5 5v12a5 5 0 005 5h8a5 5 0 005-5V8a5 5 0 00-5-5h-2M6 12h12m-6 4v-4m0 8v-4m-4 4h8" />
                </svg>
                Login Admin
            </button>
        </a>

        <a href="{{ url('user/login') }}" class="block w-full">
            <button class="w-full py-3 bg-green-800 text-white font-semibold rounded-lg flex items-center justify-center gap-3 hover:bg-green-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 9.75c0-1.35 1.1-2.45 2.45-2.45 1.35 0 2.45 1.1 2.45 2.45s-1.1 2.45-2.45 2.45c-1.35 0-2.45-1.1-2.45-2.45zm-3.5 3.75h10.5c.8 0 1.5.7 1.5 1.5v1.25c0 .6-.45 1.05-1.05 1.05H7.8c-.6 0-1.05-.45-1.05-1.05v-1.25c0-.8.7-1.5 1.5-1.5z" />
                </svg>
                Login User
            </button>
        </a>
    </div>
</body>
</html>
