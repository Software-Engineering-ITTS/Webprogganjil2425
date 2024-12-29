<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>List Aircraft</title>
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
            <h1 class="text-center text-3xl">List Aircraft</h1>
        </div>
    </header>
    <main>
        @if (session('success'))
            <div class="bg-green-500 p-4 rounded-md text-white mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- all product container --}}
        <div class="grid grid-cols-3">
            {{-- each container product --}}
            @foreach ($aircrafts as $aircraft)
                <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                    <h1 class="text-xl text-center"> <strong>{{ $aircraft->name }}</strong></h1>
                    <img src="{{ asset('storage/' . $aircraft->photo) }}" alt="Aircraft Image"
                        class="w-full h-64 object-cover rounded-md my-3">
                    <p> <strong>Type :</strong> {{ $aircraft->type }}</p>
                    <p> <strong>National Origin : </strong> {{ $aircraft->nationalorigin }}</p>
                    <p> <strong>Manufactured :</strong>{{ $aircraft->manufactured }}</p>
                    <p> <strong> Price :</strong> {{ $aircraft->price }}</p>
                    <div class="flex justify-center">
                        <!-- Edit Button -->
                        <div class="bg-blue-700 p-2 w-auto rounded-md hover:bg-blue-500 mx-3">
                            <a href="{{ route('admin.aircraft.edit', $aircraft->id) }}" class="font-bold">Edit</a>
                        </div>

                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('admin.aircraft.delete', $aircraft->id) }}"
                            onsubmit="return confirm('Are you sure you want to delete this aircraft?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-700 p-2 w-auto rounded-md hover:bg-red-500 font-bold">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
    <footer>
        <div class="flex justify-center mb-9">
            <p class="text-white">© iamjustzero</p>
        </div>
    </footer>
</body>

</html>
