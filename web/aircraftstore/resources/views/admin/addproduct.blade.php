<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Add Aircraft</title>
</head>

<body class="min-h-screen bg-black text-white">
    <nav class="flex justify-center bg-gray-900 p-4">
        <div class="mx-3">
            <a href="/admin/dashboard" class="hover:bg-gray-700 p-2 rounded-md">Dashboard</a>
        </div>
        <div class="mx-3">
            <a href="/admin/addproduct" class="hover:bg-gray-700 p-2 rounded-md">Add Aircraft</a>
        </div>
        <div class="mx-3">
            <a href="/admin/history" class="hover:bg-gray-700 p-2 rounded-md">History</a>
        </div>
        <div class="mx-3">
            <a href="/admin/listproduct" class="hover:bg-gray-700 p-2 rounded-md">List Aircraft</a>
        </div>
        <div class="mx-3">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <a href="/" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="hover:bg-red-700 p-2 rounded-md">{{ __('Log Out') }}</a>
            </form>
        </div>
    </nav>
    <header>
        {{-- Header Content --}}
        <div class="p-3 my-7">
            <h1 class="text-center text-3xl">Add Aircraft</h1>
        </div>
    </header>
    <main>
        {{-- Main Content --}}
        <div class="container mx-auto max-w-xl mb-7">
            @if (@session('success'))
                <div class="bg-green-500 text-white p-4 rounded-xl mb-5">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <form action="{{ route('admin.addproduct.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <label for="name" class="block mb-1 mt-3">Aircraft Name</label>
                    <input type="text" name="name" id="name" class="block w-full rounded-md text-black"
                        required>
                </div>
                <div class="">
                    <label for="type" class="block mb-1 mt-3">Type</label>
                    <input type="text" name="type" id="type" class="block w-full rounded-md text-black"
                        required>
                </div>
                <div class="">
                    <label for="nationalorigin" class="block mb-1 mt-3">National Origin</label>
                    <input type="text" name="nationalorigin" id="nationalorigin"
                        class="block w-full rounded-md text-black" required>
                </div>
                <div class="">
                    <label for="manufactured" class="block mb-1 mt-3">Manufactured</label>
                    <input type="text" name="manufactured" id="manufactured"
                        class="block w-full rounded-md text-black" required>
                </div>
                <div class="">
                    <label for="price" class="block mb-1 mt-3">Price</label>
                    <input type="text" name="price" id="price" class="block w-full rounded-md text-black"
                        required>
                </div>
                <div class="">
                    <label for="photo" class="block mb-1 mt-3">Upload Photo</label>
                    <input type="file" name="photo" id="photo" class="block w-full rounded-md " required>
                </div>
                <div class="flex justify-center mt-9">
                    <div class="w-fit bg-blue-500 p-2 rounded-md">
                        <button type="submit" class="font-bold">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <div class="flex justify-center mb-9">
            <p class="text-white">© iamjustzero</p>
        </div>
    </footer>
</body>

</html>
