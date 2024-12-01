<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="m-5">
      <h1 class="ms-5">Update Data</h1>
        <form action="{{ route('mahasiswa.update', $mahasiswas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3 ms-4 ps-2 mt-5">
                <label>NIM :</label>
                <input type="text" name="NIM" value="{{ $mahasiswas->NIM }}">
            </div>

            <div class="mb-3 ms-3">
                <label>NAMA :</label>
                <input type="text" name="NAMA" value="{{ $mahasiswas->NAMA }}">
            </div>

            <div class="mb-3 ms-3">
                <label>PRODI :</label>
                <input type="text" name="PRODI" value="{{ $mahasiswas->PRODI }}">
            </div>

            <div class="mb-3">
                <label>ALAMAT :</label>
                <input type="text" name="ALAMAT" value="{{ $mahasiswas->ALAMAT }}">
            </div>

            <input type="hidden" name="id_fakultas" value="{{ $mahasiswas->id_fakultas }}">

            <button class="btn btn-success ms-5 mx-2" type="submit">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
