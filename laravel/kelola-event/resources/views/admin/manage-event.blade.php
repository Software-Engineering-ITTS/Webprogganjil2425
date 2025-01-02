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
    <h1>Manage Event: {{ $event->name }}</h1>
    <p>{{ $event->description }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <p><strong>Time:</strong> {{ $event->start_time->format('d M Y H:i') }} - {{ $event->end_time->format('d M Y H:i') }}</p>

    <hr>

    <h2>Registrations</h2>
    <ul class="list-group mt-3">
        @foreach ($registrations as $registration)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>Name:</strong> {{ $registration->user->name }}<br>
                    <strong>NIM:</strong> {{ $registration->nim }}<br>
                    <strong>Attendance Code:</strong> {{ $registration->attendance_code }}
                </div>
                <div>
                    @if ($registration->attendance_photo)
                        <img src="{{ asset('storage/' . $registration->attendance_photo) }}" alt="Attendance Photo" style="max-width: 100px;">
                    @else
                        <span>No photo submitted</span>
                    @endif
                    <form action="{{ route('admin.confirmAttendance', $registration->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Confirm Attendance</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
