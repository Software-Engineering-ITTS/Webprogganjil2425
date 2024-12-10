<x-app-layout>
    <x-slot name="title">Books - Toko Buku</x-slot>

    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">Books</h1>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Add New Book
            </a>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($books as $book)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($book->cover)
                    <img src="{{ asset('storage/covers/'.$book->cover) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No image</span>
                    </div>
                @endif
                
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $book->title }}</h2>
                    <p class="mt-2 text-gray-600">By {{ $book->author }}</p>
                    <p class="mt-2 text-gray-700">{{ Str::limit($book->description, 100) }}</p>
                    
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-900">Rp {{ number_format($book->price, 0, ',', '.') }}</span>
                        <span class="text-sm text-gray-600">Stock: {{ $book->stock }}</span>
                    </div>

                    @if(auth()->user()->role === 'user' && $book->stock > 0)
                        <form action="{{ route('books.buy', $book->id) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex items-center space-x-4">
                                <input type="number" name="quantity" value="1" min="1" max="{{ $book->stock }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-20 sm:text-sm border-gray-300 rounded-md">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Buy
                                </button>
                            </div>
                        </form>
                    @elseif($book->stock === 0)
                        <p class="mt-4 text-red-600">Out of stock</p>
                    @endif

                    @if(auth()->user()->role === 'admin')
                        <div class="mt-4 flex justify-end space-x-2">
                            <a href="{{ route('books.edit', $book->id) }}" class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Edit
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>