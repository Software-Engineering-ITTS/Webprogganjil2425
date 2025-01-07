<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Konsultasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background: url('https://www.creativefabrica.com/wp-content/uploads/2022/10/01/Soft-blue-watercolor-background-Graphics-39706046-1.jpg')
        }

        .container {
            margin-top: 50px;

        }

        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }

        .table {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #66a2e2;
            color: #282626;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center" >View Consultation Data</h2>
        @if (session('success'))
<div class="alert alert-success">
     {{ session('success') }}
   </div>
@endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Tempat Kelahiran</th>
                    <th>Gender</th>
                    <th>Umur</th>
                    <th>Dokter</th>
                    <th>Keluhan</th>
                    <th>Kondisi</th>
                    <th>Konsultasi</th>
                    <th>Antrian</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pasiens as $pasien)
                    <tr>
                        {{-- <td>{{ $pasien->id }}</td> --}}
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>{{ $pasien->tempat_kelahiran }}</td>
                        <td>{{ $pasien->gender }}</td>
                        <td>{{ $pasien->umur }}</td>
                        <td>{{ $pasien->schedule->nama ?? 'Tidak Ada Dokter'}}</td>
                        <td>{{ $pasien->keluhan }}</td>
                        <td>{{ $pasien->kondisi }}</td>
                        <td>{{ $pasien->konsultasi }}</td>
                        <td>{{ $pasien->antrian }}</td>
                    </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center">Data Tidak Ditemukan</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
