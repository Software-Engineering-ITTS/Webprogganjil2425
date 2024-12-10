<x-app-layout>
    <x-slot name="title">Page Not Found - Toko Buku</x-slot>

    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-gray-900">404</h1>
            <p class="mt-4 text-xl text-gray-600">Page not found</p>
            <a href="{{ route('books.index') }}" 
               class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Back to Home
            </a>
        </div>
    </div>
</x-app-layout>