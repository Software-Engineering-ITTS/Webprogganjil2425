@extends('layouts.app')

@section('content')
    @if(Auth::user()->role === 'admin')
    <h1 class="text-3xl font-bold text-center">Welcome, Admin</h1>
    @elseif(Auth::user()->role === 'karyawan')
        <h1 class="text-3xl font-bold text-center">Welcome, Karyawan</h1>
    @else
        <h1>Access Denied</h1>
 @endif
@endsection