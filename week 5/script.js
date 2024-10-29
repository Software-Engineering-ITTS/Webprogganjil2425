document.addEventListener("DOMContentLoaded", function () {
    // URL untuk mendapatkan daftar provinsi
    const urlProvinsi = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
    const urlKabupaten = `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`;
    const urlKecamatan = `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyId}.json`;
    const urlKelurahan = `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`;

    const provSelect = this.getElementById("provinsi")

    // Fungsi untuk fetch data provinsi
    function getProvinsi() {
        fetch(urlProvinsi)
            .then(response => response.json())
            .then(data => {
                console.log("Daftar Provinsi: ", data);
                data.forEach(prov => {
                    const option = document.createElement('option');
                    option.value = prov.id;
                    option.content = prov.nama;
                });
            })
            .catch(error => {
                console.error('Error fetching provinsi:', error);
            });
    }

    // Fungsi untuk fetch kabupaten/kota berdasarkan ID provinsi
    function getKabupaten(provinceId) {
        fetch(urlKabupaten)
            .then(response => response.json())
            .then(data => {
                console.log(`Daftar Kabupaten/Kota di Provinsi ID ${provinceId}: `, data);  // Data kabupaten/kota
                // Kamu bisa memproses data di sini, misal menampilkannya di dropdown
            })
            .catch(error => {
                console.error('Error fetching kabupaten/kota:', error);
            });
    }

    // Fungsi untuk fetch kecamatan berdasarkan ID kabupaten/kota
    function getKecamatan(regencyId) {
        fetch(urlKecamatan)
            .then(response => response.json())
            .then(data => {
                console.log(`Daftar Kecamatan di Kabupaten/Kota ID ${regencyId}: `, data);  // Data kecamatan
                // Kamu bisa memproses data di sini
            })
            .catch(error => {
                console.error('Error fetching kecamatan:', error);
            });
    }

    // Fungsi untuk fetch kelurahan berdasarkan ID kecamatan
    function getKelurahan(districtId) {
        fetch(urlKelurahan)
            .then(response => response.json())
            .then(data => {
                console.log(`Daftar Kelurahan di Kecamatan ID ${districtId}: `, data);  // Data kelurahan
                // Kamu bisa memproses data di sini
            })
            .catch(error => {
                console.error('Error fetching kelurahan:', error);
            });
    }

    // Panggil fungsi
    getProvinsi();
    // Contoh panggilan fungsi dengan ID provinsi 32 (Jawa Barat)
    getKabupaten(32);
    // Contoh panggilan fungsi dengan ID kabupaten/kota 3273 (Kota Bandung)
    getKecamatan(3273);
    // Contoh panggilan fungsi dengan ID kecamatan 3273050 (Kecamatan Bandung Wetan)
    getKelurahan(3273050);

})

