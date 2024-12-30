@extends('layout')

@section('title')
    Register
@endsection

@section('isi')
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-indigo-500">
            <div>
                <div class="flex justify-center">
                    <h3 class="text-white font-bold text-3xl">REGISTER</h3>
                </div>
                <div class="flex gap-5">
                    <img src="../icons/truck.svg" alt="">
                    <h1 class="text-white font-bold text-3xl">PENGIRIMAN BARANG</h1>
                </div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf

                    @if ($errors->any())
                        <div role="alert" class="mb-4 relative flex w-full p-3 text-sm text-white bg-red-600 rounded-md">
                            <ul class="list-disc list-inside text-white">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1" for="name"> Name </label>
                        <input
                            class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full"
                            id="name" type="text" name="name" required="required" autocomplete="name" placeholder="Masukkan Nama"/>
                        @error('name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1" for="email"> Email </label>
                        <input
                            class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full"
                            id="email" type="email" name="email" required="required" autofocus="autofocus"
                            autocomplete="username" placeholder="Masukkan Email"/>
                        @error('email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1" for="password"> Password </label>
                        <div>
                            <input
                                class="px-3 py-2 mb-3 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full"
                                id="password" type="password" name="password" required="required"
                                placeholder="Enter Password" />
                            <input
                                class="px-3 py-2 border border-gray-300 focus:border-indigo-500 focus:outline-indigo-500 rounded-md shadow-sm block w-full"
                                id="password_confirmation" type="password" name="password_confirmation" required="required"
                                placeholder="Confirm Password" />
                        </div>
                        @error('password')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="terms">
                            <div class="flex items-center">
                                <input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="terms" id="terms" required="required" />
                                <div class="ml-2">I agree to the <a target="_blank" href="#"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms
                                        of Service</a> and <a target="_blank" href="#"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy
                                        Policy</a></div>
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-4 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 bg-gray-500 hover:bg-gray-700 py-3">
                            Log in
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4 bg-indigo-600 hover:bg-indigo-500 py-3">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
