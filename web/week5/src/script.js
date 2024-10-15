let input = document.getElementById('result');
let currentInput = '', operator = '', operand1 = '';

function pressNum(el) {
  currentInput += el.value;
  input.value = currentInput;
}

function pressOperator(el) {
  if (currentInput) {
    operand1 = currentInput;
    operator = el.value === 'x' ? '*' : el.value;
    currentInput = '';
  }
}

function calculate() {
  if (operand1 && currentInput && operator) {
    input.value = eval(operand1 + operator + currentInput);
    reset();
  }
}

function reset() {
  currentInput = operator = operand1 = '';
}

function clearInput() {
  input.value = '';
  reset();
}
