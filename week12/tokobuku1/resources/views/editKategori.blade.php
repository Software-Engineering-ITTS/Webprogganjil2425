<!doctype html>
<html>
<head>
    <title>Edit Kategori</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    @include('components.navbar')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="bg-white p-6 shadow-md rounded-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_genre" class="block text-sm font-medium text-gray-700">Nama Genre</label>
                <input class="input border border-gray-300 rounded-md p-2 w-full" type="text" name="nama_genre" id="nama_genre" value="{{ $kategori->nama_genre }}" required>
            </div>
            <button class="btn bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
        </form>
    </div>
</body>
</html>
