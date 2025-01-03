<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Registrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background: url('https://www.creativefabrica.com/wp-content/uploads/2022/10/01/Soft-blue-watercolor-background-Graphics-39706046-1.jpg');
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

        .profile-photo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

    </style>
</head>

<body>
    <div class="container my-6">
        <h2 class="text-center">View Profiles Registration</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($profiles as $profile)
                    <tr>
                        <td>
                             {{-- @if ($profile -> foto) --}}
                                <img src="{{ asset('storage/' . $profile->foto) }}" alt="Foto Profile" class="profile-photo"></td>
                              {{-- @else
                                 <img src="{{ asset('/default_profile.png') }}" alt="foto default" class="profile-photo">
                             @endif --}}
                        </td>

                        <td>{{ $profile->nama }}</td>
                        <td>{{ $profile->alamat}}</td>
                        <td>{{ $profile->email }}</td>
                        <td>{{ $profile->telepon }}</td>
                    </tr>
                    @empty
                </tr>
                    <td colspan="5" class="text-center">Data Tidak Ditemukan</td>
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
