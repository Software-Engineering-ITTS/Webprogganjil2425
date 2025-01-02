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
                    <a href="admin" class="nav-link mb-2" style="background:lightblue">
                        <i class="fas fa-home me-2"></i>
                        Dashboard
                    </a>
                    <br>
                    <a href="ulasan" class="nav-link mb-2">
                        <i class="fas fa-star me-2"></i>
                        Feedback
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 p-4">
                <!-- Welcome Banner -->
                <div class="card mb-4 bg-primary text-white">
                    <div class="card-body">
                        <h4 class="mb-2"><i class="fas fa-shield-alt me-2"></i>Dashboard Admin</h4>
                        <p class="mb-0">Selamat Datang di Admin Panel.</p>
                    </div>
                </div>
                
                @yield('navbar')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>