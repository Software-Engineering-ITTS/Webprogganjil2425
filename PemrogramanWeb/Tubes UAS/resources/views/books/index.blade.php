<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perpustakaan digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="bg-dark text-white py-3">
    </div>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
        <div class="container py-1">
            <a class="navbar-brand text-center" href="#">
                <h1>Buku</h1>
            </a>
        </div>
        <a href="{{ route('logout') }}" class="btn btn-primary" role="menuitem"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ffc107;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #6c757d;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-title {
            color: #343a40;
            font-weight: bold;
        }

        .card-text {
            color: #6c757d;
        }

        .card-img-top {
            border-bottom: 3px solid #ffc107;
            border-radius: 8px 8px 0 0;
        }

        .btn-custom {
            background-color: #343a40;
            color: #ffffff;
            border: 1px solid #343a40;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #ffc107;
            color: #343a40;
            border-color: #ffc107;
        }
    </style>
    </head>

    <body>
        <div class="container my-5">
            <div class="row g-4">
                @foreach ($books as $item)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset('./img/' . $item->cover_image) }}" class="card-img-top" alt="Book Cover"
                                style="height: 300px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">Author : {{ $item->author }}</p>
                                <p class="card-text">Stok : {{ $item->quantity }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('loans.create') }}" class="btn btn-custom">Pinjam buku</a>
                <a href="{{ route('returns.create') }}" class="btn btn-custom">Mengembali buku</a>
            </div>
        </div>
    </body>

</html>
