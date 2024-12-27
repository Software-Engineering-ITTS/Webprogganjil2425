<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Data Aset Perusahaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-gray-600 rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-white mb-6">Login</h2>
        <form method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-white">Username</label>
                <input
                    id="username"
                    type="username"
                    name="username"
                    value="{{ old('username') }}"
                    required
                    autocomplete="username"
                    autofocus
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                >
                @error('username')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-white">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                >
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center mb-4">
                <input
                    id="remember"
                    type="checkbox"
                    name="remember"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                    {{ old('remember') ? 'checked' : '' }}
                >
                <label for="remember" class="ml-2 block text-sm text-white">Remember Me</label>
            </div>
            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200"
                >
                    Login
                </button>
            </div>
        </form>
    </div>
</body>
</html>