import './bootstrap';

// resources/js/app.js

document.addEventListener('DOMContentLoaded', () => {
    // Contoh interaksi: Tambahkan konfirmasi saat ingin menghapus produk
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
            if (!confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
                e.preventDefault();
            }
        });
    });
});
