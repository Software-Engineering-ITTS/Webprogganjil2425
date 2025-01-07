@extends('layouts.app')
@section('content')
    <main class="container mx-auto p-4 tect-center">
        <h2 class="text-3xl font bold mb-4">Pembelian Sukses!</h2>
        <p>Terima Kasih Sudah Berbelanja di Arin's Book</p>
        <a href="{{ url('/') }}" class="bg-blue-400 text-white px-4 py-2 mt-4 rounded">Kembali ke Home</a>
    </main>
@endsection
