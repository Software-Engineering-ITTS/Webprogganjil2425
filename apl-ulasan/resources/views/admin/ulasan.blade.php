<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Feedback</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="layout">
                <i class="fas fa-comments me-2"></i>
                Sistem Feedback
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-shield me-2"></i>
                            Admin User
                            <span class="badge bg-danger ms-2">Administrator</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 bg-light p-3 min-vh-100">
                <div class="d-flex flex-column">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-circle fa-4x text-secondary mb-2"></i>
                        <h6 class="mb-1">Welcome back,</h6>
                        <h5 class="mb-2">Admin User!</h5>
                        <span class="badge bg-success">Online</span>
                    </div>
                    <hr>
                    <a href="admin" class="nav-link mb-2" >
                        <i class="fas fa-home me-2"></i>
                        Dashboard
                    </a>
                    <br>
                    <a href="ulasan" class="nav-link mb-2" style="background:lightblue">
                        <i class="fas fa-star me-2"></i>
                        Feedback
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 p-4">
                <!-- Dashboard Stats -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5>Total Feedback</h5>
                                <h2>5</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5>Average Rating</h5>
                                <h2>4.5</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5>New Today</h5>
                                <h2>3</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h5>Pending Review</h5>
                                <h2>5</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Feedback -->
                <div class="mt-5">
                    <h1 class="mb-4">Welcome to Admin Home</h1>

                    <h2 class="mb-4">Feedback List</h2>

                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($feedbacks as $index => $feedback)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $feedback->name }}</td>
                                    <td>{{ $feedback->email }}</td>
                                    <td>{{ $feedback->rating }}</td>
                                    <td>{{ $feedback->comment }}</td>
                                    <td>
                                        @if ($feedback->image)
                                            <img src="{{ asset('storage/' . $feedback->image) }}" alt="Image" class="img-thumbnail" style="width: 100px; height: auto;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Feedback Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
