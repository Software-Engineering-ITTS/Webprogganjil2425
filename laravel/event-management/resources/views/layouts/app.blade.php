<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="">
        <!-- Navbar -->
        <nav class="bg-primary navbar sticky-top">
            <div class="container ">
                {{-- pengecekan untuk memisahkan navbar antar role admin dan user --}}
                @if(Auth::user()->role === 'admin')
                        <h3 class="fw-bold text-white">Admin</h3>
                @elseif(Auth::user()->role === 'user')
                       <h3 class="fw-bold text-white">Event</h3>
                @endif
                <ul class="list-unstyled navbar mt-2 justify-content-center gap-4 align-items-center">
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="text-decoration-none text-white" href="{{ route('dashboard.admin') }}" >Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-decoration-none text-white" href="{{ route('registrations.index') }}" >View Kehadiran</a>
                        </li>
                    @elseif(Auth::user()->role === 'user')
                        <li class="nav-item">
                            <a class="text-decoration-none text-white " href="{{ route('ListEvent') }}" >Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-decoration-none text-white" href="{{ route('events.list') }}" >Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-decoration-none text-white" href="{{ route('attendance.view') }}" >Attendance</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf
                            <button type="submit"  class="btn btn-outline-light">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <main class="flex-grow container mx-auto p-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
