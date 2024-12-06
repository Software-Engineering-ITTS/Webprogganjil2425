<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>BOOKY</title>
</head>

<body class="flex justify-center items-center bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] h-screen">
    <div class="w-96 p-6 shadow-lg bg-white rounded-md">
        <h1 class="font-black text-center c mb-5">LOGIN</h1>
        <form action="/login" method="post">
            @csrf
            <div class="mb-3 mt-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan email...">
            </div>
            <div class="mb-5">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan password...">
            </div>
            <button type="submit" class="border border-[#fbc2eb] bg-[#fbc2eb] text-white py-1 rounded-md w-full hover:bg-transparent hover:text-[#fbc2eb] font-medium">Login</button>
        </form>
    </div>
</body>

</html>