@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1>Selamat Datang di Dashboard</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
@endsection
