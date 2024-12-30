@extends('layout')

@section('title')
    Login
@endsection

@section('isi')
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-indigo-500">
            <h1 class="text-white font-bold text-3xl">LOGIN</h1>
            <div class="flex gap-5">
                <img src="../icons/truck.svg" alt="">
                <h1 class="text-white font-bold text-3xl">PENGIRIMAN BARANG</h1>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label class="block font-medium text-sm text-gray-700 mb-1" for="email"> Email </label>
                        <input
                            class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full"
                            id="email" type="email" name="email" required="required" autofocus="autofocus"
                            autocomplete="username" />
                    </div>
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1" for="password"> Password </label>
                        <input
                            class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full"
                            id="password" type="password" name="password" required="required"
                            autocomplete="current-password" />
                    </div>
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                    <div class="mt-4">
                        <label for="remember_me" class="flex items-center">
                            <input type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center px-4 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 bg-gray-500 hover:bg-gray-700 py-3">
                            Register
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150  bg-indigo-600 hover:bg-indigo-500 py-3">Log
                            in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
