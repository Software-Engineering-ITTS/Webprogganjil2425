const inputNya = document.getElementById("inputNya");

function jalanInputNya(value) {
  if (inputNya.textContent === "Error Bang" || inputNya.textContent === "0") {
    inputNya.textContent = "";
  }
  inputNya.textContent += value;
}

function jalanOperasinya(operation) {
  const nilaiAkhir = inputNya.textContent.slice(-1);

  if (operation === "=") {
    try {
      inputNya.textContent = eval(inputNya.textContent);
    } catch (error) {
      inputNya.textContent = "Error Bang";
    }
  } else if (operation === "AC") {
    inputNya.textContent = "0";
  } else if (operation === "DEL") {
    inputNya.textContent = inputNya.textContent.slice(0, -1) || "0";
  } else if (!isNaN(nilaiAkhir) || nilaiAkhir === ")") {
    inputNya.textContent += operation;
  }
}

document.addEventListener("click", (e) => {
  const targetNya = e.target;
  if (targetNya.classList.contains("nomor")) {
    jalanInputNya(targetNya.textContent.trim());
  } else if (targetNya.classList.contains("operasiNya")) {
    jalanOperasinya(targetNya.textContent.trim());
  }
});
