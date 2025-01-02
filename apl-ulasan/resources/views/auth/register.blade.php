<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center m-0" style="height: 100vh; background-color:rgb(5, 204, 71)">
        <form method="POST"  class="row g-3 bg-white p-4 rounded shadow" style="width: 100%; max-width: 600px;">
            @csrf
            <h1 class="register text-center">Registrasi</h1>
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Nama Lengkap">
            </div>
            <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="email@gmail.com">
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="col-12 text-center">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-primary">Kembali ke Login</a>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Buat Akun</button>
            </div>
        </form>
    </div>
</body>

</html>