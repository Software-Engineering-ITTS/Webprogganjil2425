<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div>
        <h1 class="ms-5">Form Mahasiswa</h1>
        <form class="ms-5" method="POST" action="{{ route('mahasiswa.store') }}">
            @csrf
            <div class="mb-3 ms-4 ps-2">
                <label for="NIM">NIM : </label>
                <input type="text" name="NIM" id="NIM">
            </div>
            <div class="mb-3 ms-3">
                <label for="NAMA">NAMA : </label>
                <input type="text" name="NAMA" id="NAMA">
            </div>
            <div class="mb-3 ms-3">
                <label for="PRODI">PRODI : </label>
                <input type="text" name="PRODI" id="PRODI">
            </div>
            <div class="mb-3">
                <label for="ALAMAT">ALAMAT : </label>
                <input type="text" name="ALAMAT" id="ALAMAT">
            </div>
            <input type="id_fakultas" name="id_fakultas" value="1" hidden>
            <button type="reset" class="btn btn-warning ms-5 mx-2 px-3">Reset</button>
            <button type="submit" class="btn btn-success ms- mx-2">Submit</button>
        </form><br>
    </div>
    <h2>Data Mahasiswa</h2>
    <table class="table table-striped border border-black ">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Alamat</th>
                <th>ID Fakultas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->NIM }}</td>
                    <td>{{ $mahasiswa->NAMA }}</td>
                    <td>{{ $mahasiswa->PRODI }}</td>
                    <td>{{ $mahasiswa->ALAMAT }}</td>
                    <td>{{ $mahasiswa->id_fakultas }}</td>
                    <td>
                        <a class="btn btn-primary px-4 mb-3" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
                            <button type="submit" class="btn btn-danger px-3">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
