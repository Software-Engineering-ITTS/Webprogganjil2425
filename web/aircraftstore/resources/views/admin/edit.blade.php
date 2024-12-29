<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Edit Aircraft</title>
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
        <div class="p-3 my-7">
            <h1 class="text-center text-3xl">Edit Aircraft</h1>
        </div>
    </header>

    <main>
        <form method="POST" action="{{ route('admin.aircraft.update', $aircraft->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-white">Name</label>
                <input type="text" name="name" value="{{ $aircraft->name }}"
                    class="w-full p-2 rounded-md text-black">
            </div>

            <div class="mb-4">
                <label for="type" class="block text-white">Type</label>
                <input type="text" name="type" value="{{ $aircraft->type }}"
                    class="w-full p-2 rounded-md text-black">
            </div>

            <div class="mb-4">
                <label for="nationalorigin" class="block text-white">National Origin</label>
                <input type="text" name="nationalorigin" value="{{ $aircraft->nationalorigin }}"
                    class="w-full p-2 rounded-md text-black">
            </div>

            <div class="mb-4">
                <label for="manufactured" class="block text-white">Manufactured</label>
                <input type="text" name="manufactured" value="{{ $aircraft->manufactured }}"
                    class="w-full p-2 rounded-md text-black">
            </div>

            <div class="mb-4">
                <label for="price" class="block text-white">Price</label>
                <input type="text" name="price" value="{{ $aircraft->price }}"
                    class="w-full p-2 rounded-md text-black">
            </div>

            <div class="mb-4">
                <label for="photo" class="block text-white">Photo</label>
                <input type="file" name="photo" class="w-full p-2 rounded-md">
                @if ($aircraft->photo)
                    <img src="{{ asset('storage/' . $aircraft->photo) }}" alt="Current Photo"
                        class="w-32 mt-2 rounded-md text-black">
                @endif
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-700 hover:bg-blue-500 p-2 rounded-md">Save Changes</button>
                <a href="{{ route('admin.listproduct') }}"
                    class="bg-gray-600 hover:bg-gray-400 p-2 rounded-md">Cancel</a>
            </div>
        </form>
    </main>
</body>

</html>
