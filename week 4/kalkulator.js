let expression = "";

function updateDisplay(value) {
  document.getElementById("inputField").value = value;
}

function appendValue(value) {
  expression += value;
  updateDisplay(expression);
}

function calculateResult() {
  try {
    let result = new Function("return " + expression)(); //dynamic function, menghitung langsung hasil
    expression = result.toString();
    updateDisplay(expression);
  } catch (error) {
    updateDisplay("Error");
    expression = "";
  }
}

function clearDisplay() {
  expression = "";
  updateDisplay(expression);
}
