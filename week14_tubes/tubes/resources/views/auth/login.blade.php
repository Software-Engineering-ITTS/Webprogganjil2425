<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="text-2xl font-bold text-center mb-4">Login</h2>

            @if (session('success'))
                <div class="mb-4 text-green-500 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <label for="username_or_email" class="block text-gray-700">Username or Email</label>
                <input type="text" name="username_or_email" id="username_or_email" class="w-full border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full border-gray-300 rounded-md">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Login</button>

            <div class="mt-4 text-center">
                <p class="text-gray-600">Don't have an account? 
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register here</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>
