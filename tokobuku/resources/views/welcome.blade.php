@extends('layouts.app')
@section('title', 'Home')

@section('content')
<section class="container mt-40 ml-20">
    <h1 class="text-purple-500 font-semibold pt-20 pl-20 font-sans text-xl">Hi👋,</h1>
    <p class="text-black font-bold pl-20 font-sans text-4xl">Book Dreamers & Future Seekers!</p>
    <p class="text-black pl-20 font-sans mt-2 font-semibold">Discover, Learn, and Grow | <span class="text-gray-500 font-normal">Invest in Knowledge, Empower Your Future </span></p>
    <p class="pl-20 font-sans mt-3 mb-8 text-gray-500">Welcome to My Store,<span class="text-black font-medium"> Where Futures Begin!</span></p>
    <div>
    <a href="{{ route('bukus.index') }}" class="bg-purple-500 text-white px-7 py-3 rounded-xl ml-20 font-serif d-inline hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Manage Buku</a>
    <a href="{{ route('pembelian.index') }}" class="border-2 text-dark px-7 py-3 rounded-xl ml-5 font-serif d-inline hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Payment Buku</a>
    </div>
    
@endsection