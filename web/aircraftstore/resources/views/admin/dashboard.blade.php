<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin Dashboard</title>
</head>

<body class="min-h-screen bg-black text-white">
    <nav class="flex justify-center bg-gray-900 p-4">
        <div class="mx-3">
            <a href="/admin/dashboard" class="hover:bg-gray-700 p-2 rounded-md">Dashboard</a>
        </div>
        <div class="mx-3">
            <a href="/admin/addproduct" class="hover:bg-gray-700 p-2 rounded-md">Add Product</a>
        </div>
        <div class="mx-3">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <a href="/" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="hover:bg-gray-700 p-2 rounded-md">{{ __('Log Out') }}</a>
            </form>
        </div>
    </nav>
    <header>
        {{-- Header Content --}}
        <div class="p-3 my-7">
            <h1 class="text-center text-3xl">Dashboard</h1>
        </div>
    </header>
    <main>
        {{-- Main Content --}}
    </main>
    <footer>
        {{-- Footer Content --}}
    </footer>
</body>

</html>
