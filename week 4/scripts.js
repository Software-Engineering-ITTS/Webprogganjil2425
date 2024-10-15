let displayValue = '0';
let firstOperand = null;
let operator = null;
let waitingForSecondOperand = false;

const display = document.getElementById('display');

function updateDisplay() {
    display.textContent = displayValue;
}

function appendNumber(number) {
    if (waitingForSecondOperand) {
        displayValue = String(number);
        waitingForSecondOperand = false;
    } else {
        displayValue = displayValue === '0' ? String(number) : displayValue + number;
    }
    updateDisplay();
}

//bikin method buat hapus

function setOperator(nextOperator) {
    const inputValue = parseFloat(displayValue);

    if (operator && waitingForSecondOperand) {
        operator = nextOperator;
        return;
    }

    if (firstOperand === null && !isNaN(inputValue)) {
        firstOperand = inputValue;
    } else if (operator) {
        const result = calculate();
        displayValue = `${parseFloat(result.toFixed(7))}`;
        firstOperand = result;
    }

    waitingForSecondOperand = true;
    operator = nextOperator;
    updateDisplay();
}

function calculate() {
    const inputValue = parseFloat(displayValue);

    if (isNaN(firstOperand) || isNaN(inputValue)) return;

    let result;
    switch (operator) {
        case '+':
            result = firstOperand + inputValue;
            break;
        case '-':
            result = firstOperand - inputValue;
            break;
        case '*':
            result = firstOperand * inputValue;
            break;
        case '/':
            result = firstOperand / inputValue;
            break;
        default:
            return;
    }

    displayValue = `${parseFloat(result.toFixed(7))}`;
    firstOperand = result;
    waitingForSecondOperand = true;
    operator = null;
    updateDisplay();
    return result;
}

updateDisplay();