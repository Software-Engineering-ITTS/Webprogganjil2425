<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Mahasiswa</h1>
    <form method="POST" action="/mahasiswa">
        @csrf
        <div class="mb-3">
            <label for="NIM">NIM</label>
            <input type="text" name="" id="">
        </div>
        <div class="mb-3">
            <label for="NAMA">NAMA</label>
            <input type="text" name="" id="">
        </div>
        <div class="mb-3">
            <label for="Prodi">PRODI</label>
            <input type="text" name="" id="">
        </div>
        <div class="mb-3">
            <label for="ALAMAT">ALAMAT</label>
            <input type="text" name="" id="">
        </div>

        <input type="id_fakultas" name="id_fakultas" id="" value="1" hidden>
        <button type="submit">Submit</button>
    </form>

</body>
</html>