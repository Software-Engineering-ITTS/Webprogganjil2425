@extends('layouts.app')

@section('title', 'Manage Registrations')

@section('content')
<h1 class="mb-4">Manage Registrations</h1>

<div class="card">
    <div class="card-header">Registration List</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>NIM</th>
                    <th>Event</th>
                    <th>Verification Code</th>
                    <th>Proof Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $registration)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $registration->name }}</td>
                    <td>{{ $registration->nim }}</td>
                    <td>{{ $registration->event->title }}</td>
                    <td>{{ $registration->verification_code ?? 'Not Verified' }}</td>
                    <td>
                        @if ($registration->proof_photo)
                            <a href="{{ asset('storage/' . $registration->proof_photo) }}" target="_blank">View</a>
                        @else
                            Not Submitted
                        @endif
                    </td>
                    <td>
                        @if (!$registration->verification_code)
                        <form action="{{ route('registrations.verify') }}" method="POST">
                            @csrf
                            <input type="hidden" name="registration_id" value="{{ $registration->id }}">
                            <button type="submit" class="btn btn-success btn-sm">Verify</button>
                        </form>
                        @else
                        Verified
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
