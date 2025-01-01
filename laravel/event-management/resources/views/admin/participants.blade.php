<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>Participants</h1>
    <hr>
    <ul class="list-group mt-4">
        @foreach ($participants as $participant)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>Name:</strong> {{ $participant->user->name }} <br>
                    <strong>Email:</strong> {{ $participant->user->email }}
                </div>
                <a href="{{ route('admin.attendance.verify', $participant->id) }}" class="btn btn-success btn-sm">Verify Attendance</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-4">Back to Dashboard</a>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
