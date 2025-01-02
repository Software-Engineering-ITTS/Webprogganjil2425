@extends('layouts.app')

@section('title', 'Event List')

@section('content')
<!-- Form Daftar Event -->
<div class="card mb-4">
    <div class="container">
        <h3 class="justify-content-center align-items-center d-flex">Attended Event</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Event Name</th>
                    <th>Event Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id}}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->start_date_time }}</td>
                        <td>{{ $event->end_date_time }}</td>
                        <td>{{ $event->location }}</td>
                        <td>
                            <a href="{{ route('attendance.view') }}" class="btn btn-success btn-sm">Attend Now</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
