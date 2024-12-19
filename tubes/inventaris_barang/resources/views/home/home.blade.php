@extends('layouts.app')

@section('content')
<div class="text-center dark:text-white">
    <h1 class="text-3xl font-bold mb-4">Welcome, {{ Auth::user()->name }}</h1>
    <p class="text-gray-600">You are now logged in!</p>

</div>
@endsection