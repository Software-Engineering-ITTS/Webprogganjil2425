@extends('layouts.app')

@section('content')
<div class="relative h-screen bg-cover bg-center" style="background-image: url('https://cdn.wallpapersafari.com/7/99/D40f97.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 flex justify-center items-center h-full">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 w-96 bg-opacity-60 dark:bg-opacity-60">
            <h1 class="text-3xl font-bold text-center mb-6 dark:text-white">Your Profile</h1>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-gray-600 dark:text-gray-300 font-semibold">Name:</span>
                    <span class="text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-600 dark:text-gray-300 font-semibold">Username:</span>
                    <span class="text-gray-900 dark:text-white">{{ Auth::user()->username }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-600 dark:text-gray-300 font-semibold">Email:</span>
                    <span class="text-gray-900 dark:text-white">{{ Auth::user()->email }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-600 dark:text-gray-300 font-semibold">Role:</span>
                    <span class="text-gray-900 dark:text-white">{{ ucfirst(Auth::user()->role) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
