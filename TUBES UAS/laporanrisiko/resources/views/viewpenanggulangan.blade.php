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
        <button class="btn btn-warning"><a href="/admin/dashboard" class="text-decoration-none text-dark">Kembali</a></button>
        <br><br>
        <h2>Histori Penanggulangan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Risiko</th>
                    <th>Penanggulangan</th>
                    <th>Penanggung Jawab</th>
                    <th>Status</th>
                    <th>Target Penyelesaian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penanggulangan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->id_risiko }}</td>
                        <td>{{ $item->penanggulangan }}</td>
                        <td>{{ $item->penanggung_jawab }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->target_penyelesaian }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer class="bg-custom-green text-white py-3 mt-5 fixed-bottom">
        <div class="container text-center">
            <p>&copy; 2025 Sistem Laporan Risiko . all rights reserved</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
