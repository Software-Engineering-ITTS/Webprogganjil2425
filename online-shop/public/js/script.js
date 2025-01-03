document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("pemesananForm");
    const successMessage = document.getElementById("successMessage");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Mencegah pengiriman default form

        // Validasi Form
        if (validateForm()) {
            // Tampilkan pesan sukses
            successMessage.classList.add("show"); // Tambahkan kelas "show"
            setTimeout(() => {
                successMessage.classList.remove("show"); // Hilangkan kelas "show" setelah 3 detik
                form.reset(); // Reset form
            }, 3000);
        }
    });

    function validateForm() {
        let isValid = true;

        // Elemen input
        const nama = document.querySelector("input[name='customer_name']");
        const email = document.querySelector("input[name='customer_email']");
        const alamat = document.querySelector("input[name='address']");
        const noTelp = document.querySelector("input[name='phone']");
        const produk = document.querySelector("select[name='product_name']");
        const jumlah = document.querySelector("input[name='quantity']");
        const paperSize = document.querySelector("input[name='paper_size']:checked");
        const jenisKertas = document.querySelectorAll(".jenis-kertas input[type='checkbox']");
        const pengiriman = document.getElementById("pengiriman");

        // Reset pesan error
        resetErrorMessages();

        // Validasi nama
        if (nama.value.trim() === "") {
            showError(nama, "Nama harus diisi.");
            isValid = false;
        }

        // Validasi email
        if (email.value.trim() === "" || !validateEmail(email.value)) {
            showError(email, "Email harus diisi dengan format yang benar.");
            isValid = false;
        }

        // Validasi alamat
        if (alamat.value.trim() === "") {
            showError(alamat, "Alamat harus diisi.");
            isValid = false;
        }

        // Validasi no telepon
        if (noTelp.value.trim() === "" || !/^\d+$/.test(noTelp.value)) {
            showError(noTelp, "No Telepon harus diisi dengan angka saja.");
            isValid = false;
        }

        // Validasi produk
        if (produk.value === "") {
            showError(produk, "Silakan pilih produk.");
            isValid = false;
        }

        // Validasi jumlah
        if (jumlah.value.trim() === "" || parseInt(jumlah.value) < 1) {
            showError(jumlah, "Jumlah harus diisi dengan angka positif.");
            isValid = false;
        }

        // Validasi ukuran kertas
        if (!paperSize) {
            showError(document.querySelector(".radio-group"), "Silakan pilih ukuran kertas.");
            isValid = false;
        }

        // Validasi jenis kertas
        if (![...jenisKertas].some((checkbox) => checkbox.checked)) {
            showError(document.querySelector(".jenis-kertas"), "Silakan pilih minimal satu jenis kertas.");
            isValid = false;
        }

        // Validasi pengiriman
        if (pengiriman.value === "") {
            showError(pengiriman, "Silakan pilih jenis pengiriman.");
            isValid = false;
        }

        return isValid;
    }

    function showError(input, message) {
        const error = document.createElement("small");
        error.className = "error-message";
        error.textContent = message;
        input.parentElement.appendChild(error);
        input.classList.add("input-error"); // Tambahkan gaya untuk input yang salah
    }

    function resetErrorMessages() {
        document.querySelectorAll(".error-message").forEach((el) => el.remove());
        document.querySelectorAll(".input-error").forEach((el) => el.classList.remove("input-error"));
    }

    function validateEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }
});
