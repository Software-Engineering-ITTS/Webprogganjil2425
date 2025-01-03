<x-app-layout>
    <div class="py-6 bg-gray-100">
    <div class="w-full mx-auto p-6 bg-white rounded-lg shadow-md">
        <strong class="text-2xl font-bold text-center mb-4">Form Pengaduan</strong>
        <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="title" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" placeholder="Masukkan judul pengaduan">
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date:</label>
                <input type="date" name="date" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" rows="4" placeholder="Masukkan deskripsi pengaduan"></textarea>
            </div>
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">File:</label>
                <input type="file" name="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>
            <button type="submit" class="w-full bg-[#2B4DC994] text-white font-extrabold py-2 rounded-md">Kirim</button>
        </form>
    </div>
    </div>
</x-app-layout>