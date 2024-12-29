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
        <div class="container mx-auto max-w-xl mb-7">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-xl mb-5">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.aircraft.update', $aircraft->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block mb-1">Aircraft Name</label>
                    <input type="text" name="name" id="name" value="{{ $aircraft->name }}"
                        class="block w-full rounded-md text-black" required>
                </div>

                <div class="mb-4">
                    <label for="type" class="block mb-1">Type</label>
                    <input type="text" name="type" id="type" value="{{ $aircraft->type }}"
                        class="block w-full rounded-md text-black" required>
                </div>

                <div class="mb-4">
                    <label for="nationalorigin" class="block mb-1">National Origin</label>
                    <input type="text" name="nationalorigin" id="nationalorigin"
                        value="{{ $aircraft->nationalorigin }}" class="block w-full rounded-md text-black" required>
                </div>

                <div class="mb-4">
                    <label for="manufactured" class="block mb-1">Manufactured</label>
                    <input type="text" name="manufactured" id="manufactured" value="{{ $aircraft->manufactured }}"
                        class="block w-full rounded-md text-black" required>
                </div>

                <div class="mb-4">
                    <label for="price" class="block mb-1">Price</label>
                    <input type="text" name="price" id="price" value="{{ $aircraft->price }}"
                        class="block w-full rounded-md text-black" required>
                </div>

                <div class="mb-4">
                    <label for="photo" class="block mb-1">Upload Photo</label>
                    <input type="file" name="photo" id="photo" class="block w-full rounded-md">
                    @if ($aircraft->photo)
                        <img src="{{ asset('storage/' . $aircraft->photo) }}" alt="Current Photo"
                            class="w-32 mt-2 rounded-md">
                    @endif
                </div>

                <div class="flex justify-center mt-9">
                    <div class="w-fit bg-blue-500 p-2 rounded-md">
                        <button type="submit" class="font-bold">Save Changes</button>
                    </div>
                    <div class="w-fit bg-gray-600 p-2 rounded-md ml-3">
                        <a href="{{ route('admin.listproduct') }}" class="font-bold">Cancel</a>
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
