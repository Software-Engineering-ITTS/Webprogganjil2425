<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Attendance</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>Verify Attendance</h1>
    <hr>
    <div class="card mt-4">
        <div class="card-header">
            Attendance Details
        </div>
        <div class="card-body">
            <p><strong>Attendance Code:</strong> {{ $attendance->attendance_code }}</p>
            <p><strong>Attendance Photo:</strong></p>
            @if ($attendance->attendance_photo)
                <img src="{{ asset('storage/' . $attendance->attendance_photo) }}" alt="Attendance Photo" class="img-fluid">
            @else
                <p>No photo uploaded.</p>
            @endif
        </div>
    </div>
    <a href="{{ route('admin.event.participants', $attendance->event_id) }}" class="btn btn-secondary mt-4">Back to Participants</a>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
