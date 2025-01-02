<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex justify-center items-center">
                            <img src="https://i.pinimg.com/736x/9e/07/c9/9e07c93bbfe5a8dda54d9c6228cd976b.jpg" alt="">
                        </div>
                        <div class="flex flex-col justify-center">
                            <strong class="text-3xl font-bold text-center mb-8">Layanan Informasi dan Dokumentasi Publik Masyarakat Indonesia</strong>
                            <h1 class="text-xl font-bold text-center mb-4">
                                Sebagaimana amanat undang-undang 14 tahun 2008 tentang Keterbukaan Informasi Publik
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong class="text-2xl font-bold text-center mb-4">Kontak Kami</strong>
                    <form action="ajibayu@gmail.com" method="POST" enctype="text/plain">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                            <input type="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" placeholder="Masukkan email Anda">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Message:</label>
                            <textarea name="message" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" rows="4" placeholder="Masukkan pesan Anda"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gray-800 text-white font-extrabold py-2 rounded-md">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>