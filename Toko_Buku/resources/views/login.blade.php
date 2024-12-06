@extends('layouts.app')
@section('content')
    <main class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Login Admin</h2>
        <form action="{{ url('/admin/login') }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-gray-500">Username</label>
                <input type="text" name="username" id="username" class="w-full border rounded px-4 py-2">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-500">Password</label>
                <input type="password" name="password" id="password" class="w-full border rounded px-4 py-2">
            </div>
            <button type="submit" class="bg-blue-400 text-white px-4 py-2 rounded">Login</button>
        </form>
    </main>
@endsection
