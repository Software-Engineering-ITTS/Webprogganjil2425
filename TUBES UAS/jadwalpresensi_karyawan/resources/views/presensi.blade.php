<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>WORKSET</title>

    <script>
        // Fungsi untuk menonaktifkan field tertentu
        function ubahfields() {
            var status = document.getElementById("status_hadir").value;
            var jamMasuk = document.getElementById("jam_masuk");
            var tanggal = document.getElementById("tanggal");

            // Jika status adalah Izin atau Sakit, disable field lainnya
            if (status === "Izin" || status === "Sakit") {
                jamMasuk.value = "00:00";
                tanggal.readonly = true;
            } else {
                jamMasuk.readonly = false;
                tanggal.readonly = false;
            }
        }

        window.onload = function() {
            const currentTime = new Date().toTimeString().slice(0, 5);
            document.getElementById('jam_masuk').value = currentTime;
        }
    </script>
</head>

<body class="bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] min-h-screen">
    <div style="margin-left: 50px; margin-top: 40px;">
        <button class="bg-white text-black px-5 py-2 rounded-md hover:bg-[#0000] hover:text-white"><a href="/karyawan/lihatjadwal">Kembali</a></button>
    </div>
    <!-- MAIN -->
    <div class="flex justify-center items-center">
        <div class="w-2/3 p-6 shadow-lg bg-white rounded-md mt-5 mb-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-5">Form Presensi Karyawan</h1>
            <form action="/karyawan/presensi" method="post">
                @csrf
                <input type="hidden" name="id_jadwal_kerja" value="{{ $jadwal_kerja->id }}">
                <input type="hidden" name="id_karyawan" value="{{ $jadwal_kerja->id_karyawan }}">
                <div class="mb-3 mt-3">
                    <label for="status_hadir">Status Kehadiran</label>
                    <select name="status_hadir" id="status_hadir" class="border rounded-md w-full text-base px-2 py-1" required onchange="ubahfields()">
                        <option value="" disabled selected>Pilih status kehadiran</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="border rounded-md w-full text-base px-2 py-1" placeholder="Pilih tanggal pindah..." value="{{ $jadwal_kerja->tanggal }}" required readonly>
                </div>
                <div class="mb-3 mt-3">
                    <label for="jam_masuk">Jam Masuk</label>
                    <input type="time" name="jam_masuk" id="jam_masuk" class="border rounded-md w-full text-base px-2 py-1" required>
                </div>
                @if (session('error'))
                <div class="p-4 rounded-md mb-4">
                    {{ session('error') }}
                </div>
                @endif
                <button type="submit" class="border border-[#fbc2eb] bg-[#fbc2eb] text-white py-1 rounded-md w-full hover:bg-transparent hover:text-[#fbc2eb] font-medium">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>