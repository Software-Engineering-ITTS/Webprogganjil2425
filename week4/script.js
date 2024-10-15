let outputUpper = document.querySelector("#upper");
let outputLower = document.querySelector("#lower");

function angka(e) {
  if (outputLower.innerHTML === "0") {
    outputLower.innerHTML = e.innerHTML;
  } else {
    outputLower.innerHTML += e.innerHTML;
  }
}

function operator(e) {
  let lastOperator = outputLower.innerHTML.slice(-1);
  if (lastOperator.includes("+", "-", "×", "÷")) {
    output.innerHTML = outputLower.innerHTML.slice(0, -1) + e.innerHTML;
  } else {
    outputLower.innerHTML += e.innerHTML;
  }
}

function dot() {
  outputLower.innerHTML += ".";
}

function kurung(e) {
  outputLower.innerHTML += e.innerHTML;
}

function equal() {
  let exp = outputLower.innerHTML;
  outputUpper.innerHTML = exp;
  exp = exp.replace(/×/g, "*").replace(/÷/g, "/");
  let result;
  try {
    result = eval(exp);

    if (result.toString().indexOf(".") !== -1) {
      result = result.toFixed(4);
    }
  } catch (e) {
    result = "Masukkan Angkka";
  }
  outputLower.innerHTML = result;
}

function hapus() {
  outputLower.innerHTML = outputLower.innerHTML.slice(0, -1);
}

function bersihkan() {
  outputUpper.innerHTML = "";
  outputLower.innerHTML = "0";
}
