// Ambil elemen layar dan tombol
const screen = document.querySelector('.screen');
const buttons = document.querySelectorAll('button');
const clearButton = document.querySelector('.btn-clear');
const equalButton = document.querySelector('.btn-equal');

// Variabel untuk menyimpan input kalkulasi
let screenValue = '';

// Fungsi untuk memperbarui layar kalkulator
function updateScreen(value) {
    screen.value = value;
}

// Loop melalui setiap tombol dan tambahkan event listener
buttons.forEach(button => {
    button.addEventListener('click', (e) => {
        const buttonValue = e.target.getAttribute('data-num');
        
        if (buttonValue !== null) {
            // Jika tombol angka atau operator ditekan, tambahkan ke layar
            screenValue += buttonValue;
            updateScreen(screenValue);
        }
    });
});

// Fungsi untuk menghitung hasil
equalButton.addEventListener('click', () => {
    try {
        // Gunakan fungsi eval untuk menghitung ekspresi matematika
        const result = eval(screenValue);
        updateScreen(result);
        screenValue = result.toString(); // Simpan hasil untuk perhitungan selanjutnya
    } catch (error) {
        updateScreen('Error'); // Tampilkan pesan kesalahan jika ada
    }
});

// Fungsi untuk menghapus layar
clearButton.addEventListener('click', () => {
    screenValue = '';
    updateScreen('');
});
