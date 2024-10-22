function show(angka){
    let userinput = document.getElementById('userinput')
    userinput.value += angka
}

function akhir(){
    let userinput = document.getElementById('userinput')
    let total = eval(userinput.value)
    userinput.value = total
}

function bersihkan(){
    let userinput = document.getElementById('userinput')
    userinput.value = ""
}

function hapus(){
    let userinput = document.getElementById('userinput')
    userinput.value = userinput.value.slice(0, -1)
}
