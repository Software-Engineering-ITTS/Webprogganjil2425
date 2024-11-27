<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="{{route('index')}}">Lihat Data</a>
    <h1>Form Mahasiswa</h1>
    <form action="{{ isset($mahasiswa) ? route('mahasiswa.update', $param) : '/mahasiswa' }}" method="post" enctype="multipart/form-data">
        @csrf

        @if(isset($mahasiswa))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="fotoktm">FOTO KTM</label>
            <input type="file" name="fotoktm" accept="image/png, image/jpeg" id="fotoktm">
        @if(isset($mahasiswa) && $mahasiswa->fotoktm)
            <img height="50" src="{{ asset('storage/uploads/' . $mahasiswa->fotoktm) }}" />
        @endif
        </div>

        <div class="mb-3">
            <label for="NIM">NIM</label>
            <input type="text" name="NIM" id="NIM" value="{{ $mahasiswa->NIM ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="NAMA">NAMA</label>
            <input type="text" name="NAMA" id="NAMA" value="{{ $mahasiswa->NAMA?? '' }}">
        </div>

        <div class="mb-3">
            <label for="PRODI">PRODI</label>
            <input type="text" name="PRODI" id="PRODI" value="{{ $mahasiswa->PRODI ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="ALAMAT">ALAMAT</label>
            <input type="text" name="ALAMAT" id="ALAMAT" value="{{ $mahasiswa->ALAMAT ?? '' }}">
        </div>
        <input type="id_fakultas" name="id_fakultas" id="" value="{{ $mahasiswa->id_fakultas ?? '1' }}" hidden>
        <button type="submit"> Submit </button>

    </form>
    <!-- <p>{{ $param }}</p> -->
</body>

</html>