@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <hr>
    <h2 >Create New Event</h2>
    <form action="{{ route('admin.event.create') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-5">
            <label for="title" class="form-label">Event Name</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Event Description</label>
            <textarea name="description" id="description" rows="4" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" name="start_date_time" id="start_date_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" name="end_date_time" id="end_date_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>

    <hr>
    <h2>Existing Events</h2>
    <ul class="list-group mt-4">
        @foreach ($events as $event)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $event->title }}
                <a href="{{ route('registrations.index', $event->id) }}" class="btn btn-warning btn-sm">View Participants</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
