<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
            {{-- header --}}
            <div class="text-white my-5">
                <h1 class="text-3xl text-center">Available Aircraft</h1>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl mb-11">
        {{-- all product container --}}
        <div class="grid grid-cols-3 gap-6">
            {{-- each container product --}}
            @foreach ($aircrafts as $aircraft)
                <div class="bg-gray-800 p-7 rounded-3xl">
                    <h1 class="text-xl text-center font-bold">{{ $aircraft->name }}</h1>
                    <img src="{{ asset('storage/' . $aircraft->photo) }}" alt="Aircraft Image"
                        class="w-full h-64 object-cover rounded-md my-3">
                    <p><strong>Type:</strong> {{ $aircraft->type }}</p>
                    <p><strong>National Origin:</strong> {{ $aircraft->nationalorigin }}</p>
                    <p><strong>Manufactured:</strong> {{ $aircraft->manufactured }}</p>
                    <p><strong>Price:</strong> {{ $aircraft->price }}</p>
                    <div class="flex justify-center mt-4">
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="aircraft_id" value="{{ $aircraft->id }}">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" min="1" required class="rounded-md w-16 text-black mx-2">
                            <button type="submit" class="bg-green-600 p-2 rounded-md hover:bg-green-500 font-bold">Buy</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <footer>
        <div class="flex justify-center mb-9">
            <p class="text-white">© iamjustzero</p>
        </div>
    </footer>
</x-app-layout>
