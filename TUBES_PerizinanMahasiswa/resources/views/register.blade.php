<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body>
    {{-- <div class="bg-gray-100 flex items-center justify-center text-2xl font-bold text-gray-800 pt-40">
        <h1>Form Perizinan Mahasiswa</h1>
    </div> --}}
    <div class="bg-gray-100 flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-white h-64 w-full">
        <div class="bg-white shadow rounded-lg p-8 w-full max-w-sm">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Form Perizinan Mahasiswa</h1>
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Register</h1>
            <form action="/aksiregister" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="username">Username</label>
                    <input class="w-full px-4 py-2 border rounded-lg shadow-sm" type="text" id="username" name="username">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="password">Password</label>
                    <input class="w-full px-4 py-2 border rounded-lg shadow-sm" type="password" id="password" name="password">
                </div>
                @if (session('error'))
                    <div class="alert text-red-700">
                        {{ session('error') }}
                    </div>
                @endif
                <a class="text-blue-500 hover:underline" href="/">login</a>
                <button class="bg-blue-500 py-2 px-4 rounded-lg text-white w-full hover:bg-blue-600" type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>