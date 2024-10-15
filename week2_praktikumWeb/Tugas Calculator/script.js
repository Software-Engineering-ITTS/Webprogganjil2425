function clearDisplay() {
    document.getElementById("display").value = "0"; // Reset ke 0 saat clear
}

function deleteLast() {
    var currentValue = document.getElementById("display").value;
    // Jika hanya ada satu karakter, reset ke 0
    if (currentValue.length === 1) {
        document.getElementById("display").value = "0";
    } else {
        document.getElementById("display").value = currentValue.slice(0, -1);
    }
}

function appendToDisplay(value) {
    var display = document.getElementById("display");
    // Jika tampilan saat ini adalah 0, kita ganti dengan angka yang ditekan
    if (display.value === "0") {
        display.value = value;
    } else {
        display.value += value;
    }
}

function calculateResult() {
    var expression = document.getElementById("display").value;
    try {
        var result = eval(expression);
        document.getElementById("display").value = result;
    } catch (error) {
        document.getElementById("display").value = "Error";
    }
}
