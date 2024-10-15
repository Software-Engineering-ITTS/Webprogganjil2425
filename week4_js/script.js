let display = document.getElementById("display");
let currentInput = "";
let previousInput = "";
let operation = undefined;

function appendNumber(number) {
  // Jangan menambahkan lebih dari satu "0" di awal input
  if (number === "0" && currentInput === "0") return;
  // Menambahkan angka ke input saat ini
  currentInput = currentInput + number;
  updateDisplay();
}

function updateDisplay() {
  // Menampilkan angka atau '0' jika input kosong
  display.textContent = currentInput || "0";
}

function chooseOperation(op) {
  if (currentInput === "") return;
  if (previousInput !== "") {
    calculate();
  }
  operation = op;
  previousInput = currentInput;
  currentInput = "";
}

function calculate() {
  let result;
  const prev = parseFloat(previousInput);
  const curr = parseFloat(currentInput);
  if (isNaN(prev) || isNaN(curr)) return;
  switch (operation) {
    case "+":
      result = prev + curr;
      break;
    case "-":
      result = prev - curr;
      break;
    case "*":
      result = prev * curr;
      break;
    case "/":
      result = prev / curr;
      break;
    default:
      return;
  }
  currentInput = result.toString();
  operation = undefined;
  previousInput = "";
  updateDisplay();
}

function clearDisplay() {
  currentInput = "";
  previousInput = "";
  operation = undefined;
  updateDisplay();
}
