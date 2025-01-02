<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>WORKSET</title>
</head>

<body class="bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee]">
    <div style="margin-left: 50px; margin-top: 40px;">
        <button class="bg-white text-black px-5 py-2 rounded-md hover:bg-[#0000] hover:text-white"><a href="/admin/daftarkaryawan">Kembali</a></button>
    </div>
    <!-- MAIN -->
    <div class="flex justify-center items-center">
        <div class="w-2/3 p-6 shadow-lg bg-white rounded-md mt-5 mb-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-5">Form Tambah Karyawan</h1>
            <form action="/admin/tambahkaryawan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan nama karyawan..." required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="nip">NIP</label>
                    <input type="number" name="nip" id="nip" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan NIP karyawan..." required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="border rounded-md w-full text-base px-2 py-1" required>
                        <option value="" disabled selected>Pilih jabatan karyawan</option>
                        <option value="Staff">Staff</option>
                        <option value="Manager">Manager</option>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="divisi">Divisi</label>
                    <select name="divisi" id="divisi" class="border rounded-md w-full text-base px-2 py-1" required>
                        <option value="" disabled selected>Pilih divisi karyawan</option>
                        <option value="Production">Production</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Creative">Creative</option>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan alamat karyawan..." required></textarea>
                </div>
                <div class="mb-3 mt-3">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="number" name="no_telp" id="no_telp" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan no telp karyawan..." required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan email karyawan..." required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan password karyawan..." required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="border rounded-md w-full text-base px-2 py-1" required>
                </div>
                <button type="submit" class="border border-[#fbc2eb] bg-[#fbc2eb] text-white py-1 rounded-md w-full hover:bg-transparent hover:text-[#fbc2eb] font-medium">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>