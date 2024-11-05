document.addEventListener("DOMContentLoaded", function () {
    
    // TOGGLE PASS
    document.getElementById("chkTogglePass").addEventListener('change', function(event){
        console.log(this.checked)
        var textPass = document.getElementById("inpVerifikasiPegawai")
        if (this.checked) {
            textPass.type = 'text'
        } else {
            textPass.type = 'password'
        }
    })
    
    //TOGGLE CATEGORY
    document.getElementById("selectCategory").addEventListener('change', function (event) {
        var valueSelected = this.selectedOptions[0].value
        var expDate = document.getElementById("tanggalExpiredForm")
        if(valueSelected === 'f&b'){
            expDate.hidden = false
        }else{
            expDate.hidden = true
        }
    })

    // TOGGLE STOCK
    document.getElementById("inpAvailability").addEventListener('change', function (event) {
        console.log(this.checked)

        var newStock = document.getElementById("inpNewStock")
        // if(this.checked){
            newStock.hidden = false
        // }else{
        //     newStock.hidden = true
        // }
    })
    document.getElementById("inpInAvailability").addEventListener('click', function (event) {
        console.log(this.checked)

        var newStock = document.getElementById("inpNewStock")
        // if(this.checked){
            newStock.hidden = true
        // }else{
        //     newStock.hidden = true
        // }
    })

    document.getElementById("btnClear").addEventListener('click', function(event){

    })

})
