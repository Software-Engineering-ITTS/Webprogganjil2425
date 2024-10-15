let hasil = document.getElementById('hasil');
let currentInput = '';  // Store the current number input
let operator = '';      // Store the current operator
let previousInput = ''; // Store the previous number input

function result(angka) {
  if (angka === "*" || angka === "-" || angka === "/" || angka === "+") {
    if (currentInput === '' && previousInput === '') {
      return; // Prevent operator input without any numbers
    }
    if (operator !== '') {
      calculate(); // Automatically calculate the result if an operator was already entered
    }
    operator = angka; // Store the operator
    previousInput = currentInput; // Store the current input as previous input
    currentInput = ''; // Reset current input for the next number
  } else {
    currentInput += angka; // Append the number to the current input
    hasil.value = currentInput; // Display only the number (no operator)
  }
}

function calculate() {
  if (previousInput !== '' && currentInput !== '') {
    let result;
    switch (operator) {
      case '+':
        result = parseFloat(previousInput) + parseFloat(currentInput);
        break;
      case '-':
        result = parseFloat(previousInput) - parseFloat(currentInput);
        break;
      case '*':
        result = parseFloat(previousInput) * parseFloat(currentInput);
        break;
      case '/':
        result = parseFloat(previousInput) / parseFloat(currentInput);
        break;
      default:
        return;
    }
    hasil.value = result; // Display the result
    previousInput = result.toString(); // Store result for further calculations
    currentInput = ''; // Reset current input
    operator = ''; // Clear the operator after calculation
  }
}
