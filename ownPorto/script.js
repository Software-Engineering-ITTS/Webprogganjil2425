document.getElementById("downloadBtn").addEventListener("click", function() {
        const link = document.createElement("a");
        link.href = "CV_RafidDamar.pdf"; // Ganti dengan path file CV Anda
        link.download = "CV_RafidDamar.pdf"; // Nama file saat diunduh
        link.click();
    });