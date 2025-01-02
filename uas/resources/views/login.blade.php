<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-t from-[#14274E] to-[#D4E9F3] flex items-center justify-center min-h-screen">
    <div class="flex items-center space-x-8 bg-[#F1F6F9] shadow-xl rounded-lg p-8 w-full max-w-4xl">
        <!-- Application Name Section -->
        <div class="flex-1 text-center">
            <h1 class="text-5xl font-bold text-[#14274E]">GUDANG TB. PUTRA MANDIRI</h1>
        </div>

        <!-- Login Form Section -->
        <form method="POST" action="/login" class="flex flex-col space-y-6 w-full max-w-sm justify-between">
            @csrf
            <div class="flex justify-center mb-4">
                <h2 class="text-2xl font-bold text-[#14274E]">LOGIN</h2>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-[#14274E] text-sm font-bold mb-2">Username</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-[#14274E] bg-[#F1F6F9] leading-tight focus:outline-none focus:ring focus:border-[#14274E]" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-[#14274E] text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-[#14274E] bg-[#F1F6F9] leading-tight focus:outline-none focus:ring focus:border-[#14274E]" required>
            </div>
            <!-- Button aligned to the bottom right -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-[#14274E] hover:bg-[#394867] text-[#F1F6F9] font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-[#14274E]">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>
</html>
