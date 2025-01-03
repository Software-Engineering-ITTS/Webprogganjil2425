@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold">Dashboard Pelanggan</h1>
    <p>Selamat datang, {{ auth()->user()->name }}!</p>
    <ul class="mt-4">
        <li><a href="{{ route('customer.order.create') }}" class="text-blue-500 hover:underline">Buat Pesanan</a></li>
        <li><a href="{{ route('customer.track') }}" class="text-blue-500 hover:underline">Lacak Pesanan</a></li>
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
