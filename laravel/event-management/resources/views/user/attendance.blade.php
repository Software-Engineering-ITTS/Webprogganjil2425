@extends('layouts.app')

@section('title', 'Submit Attendance')

@section('content')
<h1 class="mb-4">Submit Attendance</h1>

<div class="card">
    <div class="card-header">Upload Attendance Proof</div>
    <div class="card-body">
        <form action="{{ route('attendance.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="registration_id" class="form-label">Registration ID</label>
                <input type="text" name="registration_id" id="registration_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="proof_photo" class="form-label">Proof Photo</label>
                <input type="file" name="proof_photo" id="proof_photo" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
