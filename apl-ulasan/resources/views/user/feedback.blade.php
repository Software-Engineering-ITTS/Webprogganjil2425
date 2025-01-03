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
                            <i class="fas fa-solid fa-user me-2"></i>
                            Customer User
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
                        <h6 class="mb-1">Welcome,</h6>
                        <h5 class="mb-2">Customer User!</h5>
                        <span class="badge bg-success">Online</span>
                    </div>
                    <hr>
                    <a href="/user/home" class="nav-link mb-2" >
                        <i class="fas fa-home me-2"></i>
                        Home
                    </a>
                    <br>
                    <a href="feedback" class="nav-link mb-2" style="background:lightblue">
                        <i class="fas fa-star me-2"></i>
                        Submit Feedback
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 content bg-light">
                <!-- Feedback Form -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h2>Kirim Feedback</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route ('feedback.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">rating</label>
                                <select class="form-select" id="rating" name="rating" required>
                                    <option value="">Pilih rating</option>
                                    <option value="1">1 - Sangat Buruk</option>
                                    <option value="2">2 - Buruk</option>
                                    <option value="3">3 - Cukup</option>
                                    <option value="4">4 - Baik</option>
                                    <option value="5">5 - Sangat Baik</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0]); document.getElementById('imagePreview').style.display = 'block';">
                                <img id="imagePreview" class="mt-3" alt="Preview" style="display: none; max-width: 100%; border-radius: 8px;">
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
