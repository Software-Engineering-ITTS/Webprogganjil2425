<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <hr>
    <h2>Create New Event</h2>
    <form action="{{ route('admin.event.create') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Event Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Event Description</label>
            <textarea name="description" id="description" rows="4" class="form-control"></textarea>
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

    <hr>
    <h2>Existing Events</h2>
    <ul class="list-group mt-4">
        @foreach ($events as $event)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $event->name }}
                <a href="{{ route('admin.event.participants', $event->id) }}" class="btn btn-info btn-sm">View Participants</a>
            </li>
        @endforeach
    </ul>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
