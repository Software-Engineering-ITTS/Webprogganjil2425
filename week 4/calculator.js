const display = document.querySelector('input[name="display"]');

function calculate() {
    try {
        const result = eval(display.value);
        display.value = result;
    } catch (error) {
        display.value = 'Error';
    }
}

document.querySelectorAll('input[type="button"]').forEach(button => {
    button.addEventListener('click', () => {
        if (button.value === '=') {
            calculate();
        } else if (button.value === 'AC') {
            display.value = '';
        } else if (button.value === 'DE') {
            display.value = display.value.toString().slice(0,-1);
        } else {
            display.value += button.value;
        }
    });
});