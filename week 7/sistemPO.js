document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("pemesananForm");

    form.addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Mencegah form terkirim jika ada error
        }
    });

    function validateForm() {
        let isValid = true;
        const nama = document.querySelector("input[placeholder='Nama Lengkap']");
        const email = document.querySelector("input[placeholder='Email']");
        const password = document.querySelector("input[type='password']");
        const noTelp = document.querySelector("input[placeholder='No Telepon']");
        const paperSize = document.querySelector("input[name='paper-size']:checked");
        const jenisKertas = document.querySelectorAll(".jenis-kertas input[type='checkbox']");
        const keterangan = document.getElementById("keterangan");
        
        // Validasi nama (tidak boleh kosong)
        if (nama.value.trim() === "") {
            alert("Nama harus diisi.");
            nama.focus();
            isValid = false;
        }
        
        // Validasi email (cek apakah kosong dan format sederhana)
        else if (email.value.trim() === "" || !validateEmail(email.value)) {
            alert("Email harus diisi dengan format yang benar.");
            email.focus();
            isValid = false;
        }
        
        // Validasi password (minimal 6 karakter)
        else if (password.value.length < 6) {
            alert("Password minimal harus 6 karakter.");
            password.focus();
            isValid = false;
        }
        
        // Validasi no telepon (cek apakah kosong dan hanya angka)
        else if (noTelp.value.trim() === "" || !/^\d+$/.test(noTelp.value)) {
            alert("No Telepon harus diisi dengan angka saja.");
            noTelp.focus();
            isValid = false;
        }
        
        // Validasi ukuran kertas (radio harus dipilih salah satu)
        else if (!paperSize) {
            alert("Silakan pilih ukuran kertas.");
            isValid = false;
        }

        // Validasi jenis kertas (minimal satu checkbox harus dipilih)
        else if (![...jenisKertas].some(checkbox => checkbox.checked)) {
            alert("Silakan pilih minimal satu jenis kertas.");
            isValid = false;
        }

        return isValid;
    }

    // Fungsi validasi email sederhana
    function validateEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }
});
