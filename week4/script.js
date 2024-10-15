let display = document.getElementById("display");

function munculkan(value) {
  display.value += value;
}

function hitung() {
  try {
    display.value = eval(display.value);
  } catch (error) {
    display.value = "Error";
  }
}

function hilangkan() {
  display.value = "";
}
