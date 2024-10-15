function show(angka){
    let display =  document.getElementById('display')
    display.value += angka
    console.log(display)
   

}

function samadengan(){
    let display = document.getElementById('display')
    let hasil = eval(display.value)
    display.value=hasil
    console.log(hasil)
}

function hapus(){
    let display = document.getElementById('display')
    display.value= ""
}

function deleted (){
    let display = document.getElementById('display')
    display.value = display.value.slice(0,-1)
}