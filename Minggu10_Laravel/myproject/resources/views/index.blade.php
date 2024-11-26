<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Form Mahasiswa</h1>
    <form method="POST" action="/mahasiswa">
      @csrf
      <div class="mb-3">
        <label for="NIM">NIM : </label>
        <input type="text" name="NIM" id="NIM">
      </div>
      <div class="mb-3">
        <label for="NAMA">NAMA : </label>
        <input type="text" name="NAMA" id="NAMA">
      </div>
      <div class="mb-3">
        <label for="PRODI">PRODI : </label>
        <input type="text" name="PRODI" id="PRODI">
      </div>
      <div class="mb-3">
        <label for="ALAMAT">ALAMAT : </label>
        <input type="text" name="ALAMAT" id="ALAMAT">
      </div>
      <input type="id_fakultas" name="id_fakultas" id="" value="1" hidden>
      <button type="submit">Submit</button>
    </form>

</body>

</html>
