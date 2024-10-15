const screen = document.querySelector('.Screen');
const buttons = document.querySelectorAll('.button, .buttonnol, .hasil');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        const buttonValue = button.dataset.num;

        if (buttonValue === '=') {
            try {
                // Hitung hasil
                screen.value = eval(screen.value.replace('X', '*')); // Mengganti 'X' dengan '*'
                // Kosongkan layar setelah hasil ditampilkan
                setTimeout(() => {
                    screen.value = '';
                }, 2000); // Mengosongkan setelah 2 detik
            } catch (error) {
                screen.value = 'Error';
                // Kosongkan layar setelah error
                setTimeout(() => {
                    screen.value = '';
                }, 2000);
            }
        }else if (buttonValue === 'C') {
            // Kosongkan layar
            screen.value = '';
        }else {
            // Tambahkan nilai tombol ke layar
            screen.value += buttonValue;
        }
    });
});
