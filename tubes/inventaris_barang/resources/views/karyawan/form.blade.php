@extends('layouts.app')

@section('content')
<div class="m-4 ">
    <p class="text-4xl text-white dark:text-white font-extrabold text-center">Form Karyawan</p>
    <form class="max-w-sm mx-auto" action="{{ isset($user) ? route('karyawan.update', $id) : route('karyawan.store') }}" method="POST" enctype="multipart/form-data" id="karyawanForm">
        @csrf
        @if(isset($user))
        @method('PUT')
        @endif

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
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{isset($user) ? $user->username : old('name')}}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="username"
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


        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
            <!-- Default Password is the Username -->
            <div class="relative">
                <input
                    type="password"
                    id="password"
                    name="password"
                    value=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <button type="button"
                    id="togglePassword"
                    class="absolute right-3 top-3 text-gray-500 hover:text-gray-800 focus:outline-none">
                    <i class="fas fa-eye-slash" id="passwordIcon"></i>
                </button>
            </div>

        </div>


        <div class="flex justify-between">

            <button
                type="button"
                onclick="document.getElementById('karyawanForm').reset();"
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

<!-- SHOW HIDE PASSWORD -->
<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const passwordIcon = document.getElementById('passwordIcon');

        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';

        passwordIcon.classList.toggle('fa-eye');
        passwordIcon.classList.toggle('fa-eye-slash');
    });
</script>


<script>
    document.getElementById('karyawanForm').addEventListener('submit', function (event) {
        const passwordField = document.getElementById('password');
        const usernameField = document.getElementById('username');

        if (passwordField.value.trim() === '') {
            const confirmation = confirm(`The password field is empty. The username "${usernameField.value}" will be used as the default password. Do you want to continue?`);
            if (!confirmation) {
                event.preventDefault(); // Stop form submission
            }
        }
    });
</script>
@endsection