<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-50 via-green-100 to-green-200 flex justify-center items-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm border-2 border-gray-200">

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">User Login</h2>

        <form action="{{ route('user.login.submit') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
            </div>

            <button type="submit" class="w-full py-2 bg-green-500 text-white font-bold rounded-lg hover:bg-green-700 transition duration-300">Login</button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('user.register') }}" class="inline-block px-4 py-2 text-green-500 hover:text-green-700 font-medium transition duration-300">
                Belum punya akun? Registrasi
            </a>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('login.choice') }}" class="inline-block px-4 py-2 text-gray-500 rounded-lg hover:text-gray-700 transition duration-300">
                Kembali
            </a>
        </div>
    </div>
</body>
</html>
