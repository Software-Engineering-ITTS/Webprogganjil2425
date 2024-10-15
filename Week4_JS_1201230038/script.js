let display = document.querySelector('.display');
let buttons = document.querySelectorAll('.tombol');
let currentInput = '';

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                let buttonText = button.textContent;
                if (button.textContent === '=') {
                    try {
                        display.textContent = eval(currentInput);
                    } catch (error) {
                        display.textContent = 'Masukkan Nilai!';
                        currentInput = '';
                    }
                } else {
                    currentInput += buttonText;
                    display.textContent += button.textContent;
                }
            });
        });