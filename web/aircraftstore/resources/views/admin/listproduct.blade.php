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
            <a href="/admin/history" class="hover:bg-gray-700 p-2 rounded-md">History</a>
        </div>
        <div class="mx-3">
            <a href="/admin/listproduct" class="hover:bg-gray-700 p-2 rounded-md">List Product</a>
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
            <h1 class="text-center text-3xl">List Product</h1>
        </div>
    </header>
    <main>
        {{--  --}}
        {{-- all product container --}}
        <div class="grid grid-cols-3">
            {{-- container each product --}}
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-blue-700 p-2 w-auto rounded-md hover:bg-blue-500">
                        <input type="button" value="Edit" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-blue-700 p-2 w-auto rounded-md hover:bg-blue-500">
                        <input type="button" value="Edit" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-blue-700 p-2 w-auto rounded-md hover:bg-blue-500">
                        <input type="button" value="Edit" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-blue-700 p-2 w-auto rounded-md hover:bg-blue-500">
                        <input type="button" value="Edit" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-blue-700 p-2 w-auto rounded-md hover:bg-blue-500">
                        <input type="button" value="Edit" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-blue-700 p-2 w-auto rounded-md hover:bg-blue-500">
                        <input type="button" value="Edit" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-blue-700 p-2 w-auto rounded-md hover:bg-blue-500">
                        <input type="button" value="Edit" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-blue-700 p-2 w-auto rounded-md hover:bg-blue-500">
                        <input type="button" value="Edit" class="font-bold">
                    </div>
                </div>
            </div>
    </main>
    <footer>
        {{-- Footer Content --}}
    </footer>
</body>

</html>
