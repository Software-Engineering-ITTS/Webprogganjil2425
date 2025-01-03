<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            background-color: #343a40;
            color: #ffc107;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s;
        }

        #sidebar.collapsed {
            margin-left: -250px;
        }

        #content {
            margin-left: 250px;
            transition: all 0.3s;
        }

        #content.collapsed {
            margin-left: 0;
        }

        .navbar {
            background-color: #343a40;
            color: #ffc107;
        }

        .navbar .navbar-toggler-icon {
            filter: invert(100%);
        }

        .nav-link {
            color: #ffc107 !important;
        }

        .nav-link:hover {
            color: #ffffff !important;
        }

        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #343a40;
        }

        .btn-primary:hover {
            background-color: #d39e00;
            border-color: #d39e00;
        }

        table {
            background-color: #f8f9fa;
        }

        th {
            background-color: #343a40;
            color: #ffc107;
        }

        td {
            color: #343a40;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-primary me-2" id="toggleSidebar">
                <i class="bi bi-list"></i>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar" class="bg-dark">
        <ul class="nav flex-column p-3">
            <li class="nav-item">
                <a class="nav-link active" href="/">Tambah Buku</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" role="menuitem"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div id="content" class="row p-4">
        <div class="col-md-12">
            <h1>Form Buku</h1>
            <div class="relative flex items-center">
                <form action="/admin/buku" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="flex flex-col items-center gap-6">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Buku</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="coverBuku" class="form-label">Cover Buku</label>
                            <input type="file" class="form-control" id="coverBuku" name="cover_image" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Author</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->title }}</td>
                        <td><img src="{{ asset('./img/' . $item->cover_image) }}" width="20%" alt=""></td>
                        <td>{{ $item->author }}</td>
                        <td>{{ $item->isbn }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td><button class="btn btn-warning">Edit</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        // Toggle sidebar visibility
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
        });
    </script>
</body>

</html>
