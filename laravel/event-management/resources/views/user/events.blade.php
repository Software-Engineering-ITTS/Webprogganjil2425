@extends('layouts.app')

@section('title', 'Event List')

@section('content')
<h3 class="mb-4">Available Events</h3>

<!-- Form Daftar Event -->
<div class="card ">
    <div class="card-header">Register for Event</div>
    <div class="card-body">
        <form action="{{ route('events.register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="event_id" class="form-label">Select Event</label>
                <select name="event_id" id="event_id" class="form-select" required>
                    <option value="" disabled selected>Select an Event</option>
                    @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
@endsection
