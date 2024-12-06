function handleSubmit(event) {
    event.preventDefault();
    
    // Mengambil semua nilai input
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    
    // Membuat ringkasan pembayaran
    const summary = `
        Nama: ${data.name}
        Email: ${data.email}
        Alamat: ${data.address}
        Telepon: ${data.phone}
        Jenis Kelamin: ${data.gender}
        Jumlah Tagihan: Rp ${Number(data.amount).toLocaleString('id-ID')}
        Metode Pembayaran: ${data.method}
    `;
    
    // Menampilkan ringkasan
    document.getElementById('summaryText').innerHTML = summary.split('\n').join('<br>');
    
    return false;
}

// Validasi nomor telepon
document.getElementById('phone').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Validasi jumlah tagihan
document.getElementById('amount').addEventListener('input', function(e) {
    if (this.value < 0) this.value = 0;
});