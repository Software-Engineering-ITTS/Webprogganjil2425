@extends('layouts.app')

@section('content')
<div class="m-4 ">
    <p class="text-4xl text-white dark:text-white font-extrabold text-center">Form Pelanggan</p>
    <form class="max-w-sm mx-auto" action="{{ isset($user) ? route('users.update', $id) : route('users.store') }}" method="post" method="POST" enctype="multipart/form-data" id="userForm">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ isset($user) ? $user->id : old('id') }}">

        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{isset($user) ? $user->name : old('name')}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="name"
                required />
        </div>

        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
            <input
                type="email"
                name="email"
                id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="email"
                value="{{ isset($user) ? $user->email :old('email') }}"
                required />
        </div>


  

        <div class="flex justify-between">

            <button
                type="button"
                onclick="document.getElementById('userForm').reset();"
                class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg">
                Clear
            </button>
            <div class="mx-3"></div>
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-1">
                Submit
            </button>

        </div>
    </form>
</div>
@endsection