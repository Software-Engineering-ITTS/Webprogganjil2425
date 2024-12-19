@extends('layouts.app')

@section('content')
<div class="text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome, {{ Auth::user()->name }}</h1>
            <p class="text-gray-600">You are now logged in!</p>
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700">
                    Logout
                </button>
            </form>
        </div>
@endsection