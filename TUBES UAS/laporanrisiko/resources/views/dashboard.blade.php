<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan Prioritas Risiko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-custom-green {
            background-color: #28a745;
        }
        h1 {
            font-size: 1.75rem;
        }
        .container {
            max-width: 800px;
        }
        .btn-custom-green {
            background-color: #28a745;
            border: none;
            color: white;
            font-weight: bold;
            width: 100%;
            text-align: center;
        }
        .btn-custom-green:hover {
            background-color: #218838;
        }
        .btn-secondary {
            width: 100%;
            text-align: center;
        }
        header img {
            border-radius: 50%;
        }
    </style>
</head>
<body>

    <header class="bg-custom-green text-white py-3">
        <div class="container d-flex align-items-center">
            <img src="https://ih1.redbubble.net/image.5278499885.1380/flat,750x,075,f-pad,750x1000,f8f8f8.u1.jpg" alt="Logo" class="me-3" style="width: 50px; height: 50px;">
            <h1 class="m-0 flex-grow-1">Sistem Laporan Prioritas Risiko</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning ">Logout</button>
            </form>
        </div>
    </header>

    <div class="container mt-4">
        <h1 class="text-center">Welcome, Admin!</h1>
        <p class="text-center">This is the admin dashboard where you can manage the system.</p>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">View Laporan Resiko</h5>
                        <a href="{{ url('/admin/viewlaporan') }}" class="btn btn-light">Go to Laporan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Post Penanggulangan</h5>
                        <a href="{{ url('/admin/viewpenanggulangan') }}" class="btn btn-light">Go to Penanggulangan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <footer class="bg-custom-green text-white py-3 mt-5 fixed-bottom">
        <div class="container text-center">
            <p>&copy; 2025 Sistem Laporan Risiko . all rights reserved</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
