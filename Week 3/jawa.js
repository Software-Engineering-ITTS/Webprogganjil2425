function show(value) {
  const input = document.getElementById("userinput");

  // Prevent multiple decimal points in the input
  if (value === "." && input.value.includes(".")) {
    return;
  }

  input.value += value;
}

function bersihkan() {
  const input = document.getElementById("userinput");
  input.value = "";
}

function hapus() {
  let userinput = document.getElementById("userinput");
  userinput.value = userinput.value.slice(0, -1);
}

function akhir() {
  const input = document.getElementById("userinput");
  let expression = input.value;

  // Handle percentage calculations
  expression = expression.replace("%", "/100");

  // Evaluate the expression using a reliable calculator library or function
  try {
    const result = eval(expression);
    input.value = result;
  } catch (error) {
    // Handle errors gracefully, e.g., display an error message
    input.value = "Error";
  }
}

// Other functions for additional calculator operations (e.g., backspace, square root, etc.)
