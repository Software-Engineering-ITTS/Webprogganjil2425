<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl">
        {{-- header --}}
        <div class="text-white my-5">
            <h1 class="text-3xl text-center">Available Product</h1>
        </div>
        {{-- all product container --}}
        <div class="grid grid-cols-3">
            {{-- container each product --}}
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-black p-2 w-auto rounded-md hover:bg-gray-900">
                        <input type="button" value="Buy" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-black p-2 w-auto rounded-md hover:bg-gray-900">
                        <input type="button" value="Buy" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-black p-2 w-auto rounded-md hover:bg-gray-900">
                        <input type="button" value="Buy" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-black p-2 w-auto rounded-md hover:bg-gray-900">
                        <input type="button" value="Buy" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-black p-2 w-auto rounded-md hover:bg-gray-900">
                        <input type="button" value="Buy" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-black p-2 w-auto rounded-md hover:bg-gray-900">
                        <input type="button" value="Buy" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-black p-2 w-auto rounded-md hover:bg-gray-900">
                        <input type="button" value="Buy" class="font-bold">
                    </div>
                </div>
            </div>
            <div class="bg-gray-700 p-7 rounded-3xl mx-3 my-3">
                <h1 class="text-xl text-center">Bell Boeing V-22 Osprey</h1>
                <img src="{{ asset('img/v22osprey.jpg') }}" alt="V22 Osprey" class="rounded-md my-3">
                <p>Type : Tiltrotor military transport aircraft</p>
                <p>National Origin : United States</p>
                <p>Manufactured : 1988-Present </p>
                <p>Price : $99.9999</p>
                <div class="flex justify-center">
                    <div class=" bg-black p-2 w-auto rounded-md hover:bg-gray-900">
                        <input type="button" value="Buy" class="font-bold">
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
