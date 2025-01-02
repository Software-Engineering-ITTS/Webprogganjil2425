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
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }} (Admin).</p>

    <h2>Create New Event</h2>
    <form action="{{ route('admin.createEvent') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Event Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>

    <hr class="my-4">

    <h2>Manage Events</h2>
    <ul class="list-group mt-3">
        @foreach ($events as $event)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $event->name }}</strong><br>
                    {{ $event->location }} | {{ $event->start_time->format('d M Y H:i') }} - {{ $event->end_time->format('d M Y H:i') }}
                </div>
                <a href="{{ route('admin.manageEvent', $event->id) }}" class="btn btn-info btn-sm">Manage</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
