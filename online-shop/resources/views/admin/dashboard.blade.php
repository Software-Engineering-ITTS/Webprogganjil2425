@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold">Dashboard Admin</h1>
    <p>Selamat datang, {{ auth()->user()->name }}!</p>
    <ul class="mt-4">
        <li><a href="{{ route('admin.product.index') }}" class="text-blue-500 hover:underline">Kelola Produk</a></li>
        <li><a href="{{ route('logout') }}" class="text-red-500 hover:underline" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</div>
@endsection
