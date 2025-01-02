@extends('layouts.app')
@section('title', 'Halaman Register')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class=" sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="sm:mx-auto sm:w-full sm:max-w-sm" src="{{ asset('images/login.png') }}" alt="">
            <h2 class="text-center text-2xl/9 font-bold text-gray-900">Sign up</h2>
        </div>


        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="" class="space-y-6" method="POST">
                @csrf

                <div>
                    <div class="flex items-center justify-between">
                        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                    </div>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" placeholder="Enter your valid password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 outline outline-1 focus:outline-2 sm:text-sm/6">
                    </div>
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-900">Username</label>
                    <div class="mt-2">
                        <input type="text" name="username" id="username" required placeholder="Your username address" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 outline outline-1 focus:outline-2 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" placeholder="Enter your valid password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 outline outline-1 focus:outline-2 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-teal-500 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Sign up</button>
                </div>
                <p class="mt-10 text-center text-sm/6 text-gray-500">
                Already have account?
                    <a href="{{route('login')}}" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign In</a>
                </p>
            </form>
        </div>
    </div>
@endsection