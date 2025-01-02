@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title text-white">Login</h1>
        </div>
        <div class="card-body m-3">
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="name" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Login</button>
            </form>
        </div>
    </div>
@endsection
