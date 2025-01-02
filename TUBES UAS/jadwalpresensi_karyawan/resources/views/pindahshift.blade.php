<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>WORKSET</title>
</head>

<body class="bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] min-h-screen">
    <div style="margin-left: 50px; margin-top: 40px;">
        <button class="bg-white text-black px-5 py-2 rounded-md hover:bg-[#0000] hover:text-white"><a href="/karyawan/lihatjadwal">Kembali</a></button>
    </div>
    <!-- MAIN -->
    <div class="flex justify-center items-center">
        <div class="w-2/3 p-6 shadow-lg bg-white rounded-md mt-5 mb-10">
            <h1 class="text-center font-bold text-5xl mt-2 mb-5">Form Pengajuan Pindah Jadwal Shift</h1>
            <form action="/karyawan/pindahshift" method="post">
                @csrf
                <input type="hidden" name="id_jadwal_kerja" value="{{ $jadwal_kerja->id }}">
                <input type="hidden" name="id_karyawan" value="{{ $jadwal_kerja->id_karyawan }}">
                <div class="mb-3 mt-3">
                    <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                    <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="border rounded-md w-full text-base px-2 py-1" placeholder="Pilih tanggal pindah..." value="{{ now()->format('Y-m-d') }}" required readonly>
                </div>
                <div class="mb-3 mt-3">
                    <label for="tanggal_awal">Tanggal Awal</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="border rounded-md w-full text-base px-2 py-1" placeholder="Pilih tanggal pindah..." value="{{ $jadwal_kerja->tanggal }}" required readonly>
                </div>
                <div class="mb-3 mt-3">
                    <label for="shift_awal">Shift Awal</label>
                    <input type="input" name="shift_awal" id="shift_awal" class="border rounded-md w-full text-base px-2 py-1" placeholder="Pilih tanggal pindah..." value="{{ $jadwal_kerja->shift }}" required readonly>
                </div>
                <div class="mb-3 mt-3">
                    <label for="tanggal_pindah">Pindah Tanggal</label>
                    <input type="date" name="tanggal_pindah" id="tanggal_pindah" class="border rounded-md w-full text-base px-2 py-1" placeholder="Pilih tanggal pindah..." required min="{{ $jadwal_kerja->tanggal }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="shift_pindah">Pindah Shift</label>
                    <select name="shift_pindah" id="shift_pindah" class="border rounded-md w-full text-base px-2 py-1" required>
                        <option value="" disabled selected>Pilih shift karyawan</option>
                        <option value="Pagi (07:00 - 15:00)">Pagi (07:00 - 15:00)</option>
                        <option value="Malam (15:00 - 23:00)">Malam (15:00 - 23:00)</option>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="alasan">Alasan</label>
                    <textarea name="alasan" id="alasan" class="border rounded-md w-full text-base px-2 py-1" placeholder="Masukkan alamat karyawan..." required></textarea>
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