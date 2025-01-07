<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            /* background-color: #b4c9de; */
            background: url('https://th.bing.com/th/id/OIP.1w6EepLLXO1WOaR8lZeB4QHaDX?w=1400&h=636&rs=1&pid=ImgDetMain')
        }

        .card {
            margin-top: 50px;
            background-color: #b4c9deaf;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        .row {

            padding-left: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .form-group{
            margin-left: 10px;
        }

        .form-group label {
            margin-left: 10px;
            color: #495057;

        }

        .btn-primary {
            background-color: #a9c2dc;
            border-color: #033972;
            margin-top: 50px;
            margin-left: 700px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <br><br><br><br>
        <div class="card">

            <h2 class="text-center">Pekkamed Registration Form</Form>
            </h2>
            <br>
             @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('formregistrasi')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input placeholder="inisaya" type="text" name="nama" class="form-control" id="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input placeholder="inisaya@gmail.com" type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input placeholder="012345678987" type="text" name="telepon" class="form-control" id="telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input placeholder="desaini" type="text" name="alamat" class="form-control" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto Profil</label>
                        <input type="file" name="foto" class="form-control-file" id="foto">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
