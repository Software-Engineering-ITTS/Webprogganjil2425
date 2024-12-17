<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto bg-gray-900 text-white p-9 rounded-xl my-24">
        {{-- header --}}
        <div class="text-white my-5">
            <h1 class="text-3xl text-center">Welcome to</h1>
            <h1 class="text-5xl text-center">Airforce Store</h1>
        </div>
</x-app-layout>
