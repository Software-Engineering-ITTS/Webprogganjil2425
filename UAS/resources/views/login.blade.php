<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Poppins:wght@500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-gray-900 via-black to-gray-800 h-screen flex items-center justify-center font-inter">

    <div class="bg-white p-10 rounded-lg shadow-2xl max-w-sm w-full">
        <h2 class="text-3xl font-poppins font-semibold text-center text-gray-800 mb-6">Login</h2>
        
        <form action="/login" method="POST">
            @csrf
            <div class="mb-6">
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" name="username" id="username" required 
                    class="mt-1 p-4 w-full border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition">
            </div>
            <div class="mb-8">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 p-4 w-full border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition">
            </div>
            <button type="submit" class="w-full p-4 bg-gradient-to-r from-gray-600 to-black text-white font-semibold rounded-md hover:from-gray-700 hover:to-black transition-all duration-300">
                Login
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href='/welcome' class="text-sm text-gray-500 hover:text-gray-700 transition duration-200">Don't have an account? Register</a>
        </div>
    </div>

</body>
</html>
