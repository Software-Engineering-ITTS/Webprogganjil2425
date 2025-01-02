<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    body {
        background:  #4e1f1f;
            color: #fff;
        }
        
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="bg-red-700 rounded-lg p-8 w-full max-w-md">
        <h1 class=" font-bold text-center mb-6 border-b border-red-900 pb-4">Form Login</h1>
        <form action="/login" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium">Username:</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="w-full mt-1 px-3 py-2 bg-red-100 text-black border border-red-300 rounded">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Password:</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="w-full mt-1 px-3 py-2 bg-red-100 text-black border border-red-300 rounded">
            </div>
            <button 
                type="submit" 
                class="w-full py-2 bg-red-800 text-white font-bold rounded hover:bg-red-900">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>
