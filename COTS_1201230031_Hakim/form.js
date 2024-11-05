document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk memeriksa apakah pengguna sudah login
    function checkLoginStatus() {
        return localStorage.getItem("isLoggedIn") === "true";
    }

    // Fungsi untuk mengaktifkan atau menonaktifkan form
    function toggleForm(disabled) {
        const form = document.querySelector(".form");
        form.querySelectorAll("input, textarea, button, select").forEach(element => {
            element.disabled = disabled;
        });
    }

    // Inisialisasi: matikan form jika belum login
    if (!checkLoginStatus()) {
        toggleForm(true); // Disable form
    }

    // Fungsi untuk menangani submit login
    document.querySelector(".form2").addEventListener("submit", function (e) {
        e.preventDefault(); // Mencegah reload halaman
        // Set status login ke true dan simpan di localStorage
        localStorage.setItem("isLoggedIn", "true");
        toggleForm(false); // Enable form
        alert("Login berhasil! Anda bisa mengisi form sekarang.");
    });

    // Fungsi untuk submit form dan alihkan ke bagian 'KIRIM TANGGAPAN LAIN'
    document.querySelector(".form").addEventListener("submit", function (e) {
        e.preventDefault(); // Mencegah reload halaman
        alert("Formulir berhasil disubmit!");
        window.location.hash = "kirim-tanggapan-lain";
    });
});
