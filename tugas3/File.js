let currentInput = '';
let currentOperation = null;
let previousInput = '';

function result(number) {
    currentInput += number;
    updateDisplay(currentInput);
}

function operator(operation) {
    if (currentInput === '') return;
    if (previousInput !== '') {
        calculate();
    }
    currentOperation = operation;
    previousInput = currentInput;
    currentInput = '';
}

function calculate() {
    if (currentInput === '' || currentOperation === null) return;
    let result;
    const prev = parseFloat(previousInput);
    const current = parseFloat(currentInput);

    switch (currentOperation) {
        case '+':
            result = prev + current;
            break;
        case '-':
            result = prev - current;
            break;
        case '*':
            result = prev * current;
            break;
        case '/':
            result = prev / current;
            break;
        default:
            return;
    }

    currentInput = result.toString();
    currentOperation = null;
    previousInput = '';
    updateDisplay(currentInput);
}

function clearDisplay() {
    currentInput = '';
    currentOperation = null;
    previousInput = '';
    updateDisplay('0');
}

function updateDisplay(value) {
    document.getElementById('display').value = value;
}