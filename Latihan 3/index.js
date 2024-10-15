function show(angka){
    let display = document.getElementById('display')
    display.value += angka
}

function samadengan(){
    let display = document.getElementById('display')
    let total = eval(display.value)
    display.value = total
}

function bersihkan(){
    let display = document.getElementById('display')
    display.value = ""
}