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
                        <div class="bg-blue-700 p-2 rounded-md hover:bg-blue-500 mx-2">
                            <a href="{{ route('', $aircraft->id) }}" class="font-bold">Buy</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
