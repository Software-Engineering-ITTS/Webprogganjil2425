<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <h1>List Data Mahasiswa</h1>
    <a href="{{route('form')}}">Form data Mahasiswa</a>
    <div class="table-responsive">

        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th hidden><strong>Id</strong></th>
                    <th><strong>NIM</strong></th>
                    <th><strong>NAMA</strong></th>
                    <th><strong>PRODI</strong></th>
                    <th><strong>Alamat</strong></th>
                    <th hidden><strong>id fakultas</strong></th>
                    <th><strong>fakultas</strong></th>
                    <th><strong>foto</strong></th>
                    <th><strong>Aksi</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $key => $data)
                <tr>
                    <td hidden>{{$data->id}}</td>
                    <td>{{$data->NIM}}</td>
                    <td>{{$data->NAMA}}</td>
                    <td>{{$data->PRODI}}</td>
                    <td>{{$data->ALAMAT}}</td>
                    <td hidden>{{$data->id_fakultas}}</td>
                    <td>{{$data->nama_fakultas}}</td>
                    <td>
                        <img height="50" src={{ asset('storage/uploads/'.$data->fotoktm) }} />
                    </td>
                    <td>
                        <!-- TODO -->
                        <a href="{{ route('mahasiswa.edit', $data->id) }}" class="btn btn-primary">Edit</a>


                        <form action="{{ route('mahasiswa.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus item ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <!-- <button>Hapus</button> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>