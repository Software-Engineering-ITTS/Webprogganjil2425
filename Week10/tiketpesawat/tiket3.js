document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");

    form.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent form submission to a server

        // Simple validation for required fields
        const nama = document.getElementById("nama_text").value.trim();
        const bandaraAsal = document.getElementById("bandara_asal").value;
        const bandaraTujuan = document.getElementById("bandara_tujuan").value;
        const maskapai = document.getElementById("maskapai").value.trim();
        const harga = document.getElementById("harga").value.trim();
        const pin = document.getElementById("pin").value.trim();

        if (!nama || !bandaraAsal || !bandaraTujuan || !maskapai || !harga || !pin) {
            alert("Tolong isi setiap form yang ada!");
            return;
        }

        // Display form data
        let result = `
            Nama: ${nama}
            Bandara Asal: ${bandaraAsal}
            Bandara Tujuan: ${bandaraTujuan}
            Maskapai: ${maskapai}
            Harga: ${harga}
            PIN: ${pin}
        `;

        alert("Form telah tersubmit!\n\n" + result);
    });
});
