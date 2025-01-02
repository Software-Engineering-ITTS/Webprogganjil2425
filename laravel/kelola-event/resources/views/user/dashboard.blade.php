<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>User Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}.</p>

    <h2>Available Events</h2>
    <ul class="list-group mt-3">
        @foreach ($events as $event)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $event->name }}</strong><br>
                    {{ $event->location }} | {{ $event->start_time->format('d M Y H:i') }} - {{ $event->end_time->format('d M Y H:i') }}
                </div>
                <form action="{{ route('user.register', $event->id) }}" method="POST">
                    @csrf
                    <input type="text" name="nim" placeholder="Enter your NIM" class="form-control mb-2" required>
                    <button type="submit" class="btn btn-primary btn-sm">Register</button>
                </form>
            </li>
        @endforeach
    </ul>

    <hr class="my-4">

    <h2>Confirm Attendance</h2>
    <form action="{{ route('user.confirm') }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="attendance_code" class="form-label">Attendance Code</label>
            <input type="text" name="attendance_code" id="attendance_code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="attendance_photo" class="form-label">Upload Attendance Photo</label>
            <input type="file" name="attendance_photo" id="attendance_photo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
