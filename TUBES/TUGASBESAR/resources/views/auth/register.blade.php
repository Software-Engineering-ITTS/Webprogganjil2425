<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">

    <div class="w-full max-w-lg bg-gray-800 p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center">Create a New Account</h2>

        <form action="/register" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-300 mb-2">Name:</label>
                <input type="text" name="name" required 
                       class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-300 mb-2">Email:</label>
                <input type="email" name="email" required 
                       class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-300 mb-2">Password:</label>
                <input type="password" name="password" required 
                       class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-300 mb-2">Confirm Password:</label>
                <input type="password" name="password_confirmation" required 
                       class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>

            <button type="submit" 
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-md shadow-lg">
                Register
            </button>
        </form>

        <p class="mt-6 text-center text-gray-400">Already have an account? 
            <a href="/login" class="text-green-500 hover:underline">Login here</a>
        </p>
    </div>

</body>
</html>


