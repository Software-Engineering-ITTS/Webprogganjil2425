const inputDisplay = document.querySelector('input[name="display"]');
const angkaButton = document.querySelectorAll(".angka .tombol");
const operatorButton = document.querySelectorAll(".operator .tombol2");
const hasilButton = document.getElementById("hasil");
const hapusButton = document.getElementById("hapus");

let inputSekarang = "";
let operator = "";
let inputSebelumnya = "";
let displayHasil = "";

angkaButton.forEach(button => {
    button.addEventListener("click", () => {
        inputSekarang += button.value;
        displayHasil += button.value; 
        inputDisplay.value = displayHasil;
    });
});

operatorButton.forEach(button => {
    button.addEventListener("click", () => {
        if (inputSekarang !== "") {
            inputSebelumnya = inputSekarang;
            inputSekarang = "";
            operator = button.value;
            displayHasil += " " + button.value + " ";
            inputDisplay.value = displayHasil;
        }
    });
});

hasilButton.addEventListener("click", () => {
    if (inputSebelumnya !== "" && inputSekarang !== "") {
        let hasil = 0;
        const num1 = parseFloat(inputSebelumnya);
        const num2 = parseFloat(inputSekarang);

        switch (operator) {
            case "+":
                hasil = num1 + num2;
                break;
            case "-":
                hasil = num1 - num2;
                break;
            case "x":
                hasil = num1 * num2;
                break;
            case "/":
                hasil = num1 / num2;
                break;
        }

        displayHasil = hasil.toString();
        inputDisplay.value = displayHasil;
        inputSekarang = hasil.toString();
        inputSebelumnya = "";
        operator = "";
    }
});

hapusButton.addEventListener("click", () => {
    inputSekarang = "";
    inputSebelumnya = "";
    operator = "";
    displayHasil = "";
    inputDisplay.value = "";
});
