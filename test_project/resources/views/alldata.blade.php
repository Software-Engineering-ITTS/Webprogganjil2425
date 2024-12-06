<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
</head>
<body>
    <h1>Form Mahasiswa</h1>
    <form method="POST" action="/Mahasiswa">
        @csrf
        <div>
            <label for="">KTM</label>
            <input type="file" name="ktm" id="ktm">
        </div>
        <div class="mb-3 p-5">
            <label for="">NIM</label>
            <input type="text" name="nim" id="nim">
        </div>  
        <div class="mb-3 p-5">
            <label for="">Nama</label>
            <input type="text" name="nama" id="nama">
        </div>  
        <div class="mb-3 p-5">
            <label for="">PRODI</label>
            <input type="text" name="prodi" id="prodi">
        </div>  
        <div class="mb-3 p-5">
            <label for="">ALAMAT</label>
            <input type="text" name="alamat" id="alamat">
        </div>  
        <input type="id_fakultas" name="id_fakultas" id="" value="1" hidden>
        <button class="btn" type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>

    <h2>Data Mahasiswa</h2>
    <table border="1" class="table table-striped">
        <thead>
            <tr>
                <th>KTM</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Alamat</th>
                <th>Fakultas ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $mahasiswa)
                <tr>
                    <td>
                       {{ $mahasiswa->ktm }}
                    </td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->prodi }}</td>
                    <td>{{ $mahasiswa->alamat }}</td>
                    <td>{{ $mahasiswa->id_fakultas }}</td>
                    <td>mahasiswa
                        
                        <a href="{{ route('.edit', $mahasiswa->id) }}">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>