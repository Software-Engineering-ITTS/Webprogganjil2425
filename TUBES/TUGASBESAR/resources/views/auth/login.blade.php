

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center">Login to Your Account</h2>

        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-300 mb-2">Email:</label>
                <input type="email" name="email" required 
                       class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-300 mb-2">Password:</label>
                <input type="password" name="password" required 
                       class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md shadow-lg">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-gray-400">Don't have an account? 
            <a href="register" class="text-blue-500 hover:underline">Register here</a>
        </p>
    </div>

</body>
</html>

