<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 font-sans">

    <div class="max-w-lg mx-auto p-6 bg-gray-800 shadow-lg rounded-lg mt-10">
        <h2 class="text-3xl font-semibold text-white mb-6 text-center">User Registration Form</h2>

        <form action="/pengguna" method="POST">
            @csrf
            <div class="space-y-6">
                <!-- Username Input -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-300">Username:</label>
                    <input type="text" name="username" id="username" 
                        class="mt-2 w-full p-4 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white bg-gray-700 placeholder-gray-400" 
                        placeholder="Enter your username" required>
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password:</label>
                    <input type="text" name="password" id="password" 
                        class="mt-2 w-full p-4 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white bg-gray-700 placeholder-gray-400" 
                        placeholder="Enter your password" required>
                </div>

                <!-- Nama Lengkap Input -->
                <div>
                    <label for="namalengkap" class="block text-sm font-medium text-gray-300">Nama Lengkap:</label>
                    <input type="text" name="namalengkap" id="namalengkap" 
                        class="mt-2 w-full p-4 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white bg-gray-700 placeholder-gray-400" 
                        placeholder="Enter your full name" required>
                </div>

                <!-- Handphone Input -->
                <div>
                    <label for="handphone" class="block text-sm font-medium text-gray-300">Handphone:</label>
                    <input type="text" name="handphone" id="handphone" 
                        class="mt-2 w-full p-4 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white bg-gray-700 placeholder-gray-400" 
                        placeholder="Enter your handphone number" required>
                </div>

                <!-- Alamat Input -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-300">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" 
                        class="mt-2 w-full p-4 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-white bg-gray-700 placeholder-gray-400" 
                        placeholder="Enter your address" required>
                </div>

                <!-- Hidden Role Input -->
                <input type="text" name="role" id="role" value="user" hidden>

                <!-- Submit Button -->
                <div class="mt-6 text-center">
                    <button type="submit" 
                        class="w-full bg-blue-600 text-white font-semibold p-4 rounded-md hover:bg-blue-700 transition duration-300">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
