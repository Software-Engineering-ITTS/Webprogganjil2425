<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Buku</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- page container --}}
    <div class="container mx-auto bg-slate-300 p-7 m-9 rounded-lg">
        <nav>
            {{--  --}}
        </nav>
        <header>
            {{--  --}}
            <h1 class="bg-slate-500 text-7xl text-center rounded-lg p-5 mb-11">Toko Buku</h1>
        </header>
        <main>
            {{-- container action  --}}
            <div class="container bg-blue-300 p-5 rounded-lg mt-5">
                <h3 class="text-3xl text-center mb-5">Tambah Buku</h3>
                <label for="judulbuku">Judul Buku</label>
                <br>
                <input type="text" name="" id="judulbuku">
                <br> <br>
                <label for="judulbuku">Nama Pengarang</label>
                <br>
                <input type="text" name="" id="judulbuku">
                <br> <br>
                <label for="judulbuku">Tahun Terbit</label> <br>
                <input type="text" name="" id="judulbuku">
                <br> <br>
                <label for="judulbuku">Sinopsis</label> <br>
                <input type="text" name="" id="judulbuku">
                <br>
                <label for="cover-photo">Cover Book</label>
                <br><br>
                <input type="file" name="" id="">
            </div>
            {{-- container action  --}}
            <div class="container bg-blue-300 p-5 rounded-lg mt-5">
                <h3 class="text-3xl text-center mb-5">Show Buku</h3>
                <label for="judulbuku">Judul Buku</label>
                <br>
                <input type="text" name="" id="judulbuku">
                <br> <br>
                <label for="judulbuku">Nama Pengarang</label>
                <br>
                <input type="text" name="" id="judulbuku">
                <br> <br>
                <label for="judulbuku">Tahun Terbit</label> <br>
                <input type="text" name="" id="judulbuku">
                <br> <br>
                <label for="judulbuku">Sinopsis</label> <br>
                <input type="text" name="" id="judulbuku">
                <br>
                <p>Cover Book</p>
            </div>
        </main>
        <footer>
            {{--  --}}
        </footer>
    </div>
</body>

</html>
