<x-app-layout>
    <x-slot name="title">Edit Book - Toko Buku</x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex justify-between items-center mb-5">
                    <h1 class="text-xl font-semibold text-gray-900">Edit Book</h1>
                    <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-gray-900">
                        Back to List
                    </a>
                </div>

                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <!-- Title Input -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Book Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Author Input -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                            @error('author')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description Input -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>{{ old('description', $book->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price Input -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Price (Rp)</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $book->price) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required min="0">
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock Input -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required min="0">
                            @error('stock')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Cover Image -->
                        @if($book->cover)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Current Cover</label>
                            <img src="{{ asset('storage/covers/'.$book->cover) }}" alt="Current cover" 
                                class="mt-2 w-32 h-32 object-cover rounded-md">
                        </div>
                        @endif

                        <!-- Cover Image Input -->
                        <div>
                            <label for="cover" class="block text-sm font-medium text-gray-700">
                                {{ $book->cover ? 'Change Cover Image' : 'Add Cover Image' }}
                            </label>
                            <input type="file" name="cover" id="cover" 
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                accept="image/*">
                            @error('cover')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('books.index') }}" 
                                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Cancel
                            </a>
                            <button type="submit" 
                                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update Book
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>