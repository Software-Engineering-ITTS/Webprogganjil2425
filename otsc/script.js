document.addEventListener("DOMContentLoaded", function () {

    // TOGGLE PASS
    document.getElementById("chkTogglePass").addEventListener('change', function (event) {
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
        if (valueSelected === 'f&b') {
            expDate.hidden = false
        } else {
            expDate.hidden = true
        }
    })

    // TOGGLE STOCK
    document.getElementById("inpAvailability").addEventListener('change', function (event) {
        var newStock = document.getElementById("inpNewStock")
        newStock.hidden = false

    })
    document.getElementById("inpInAvailability").addEventListener('click', function (event) {
        var newStock = document.getElementById("inpNewStock")
        newStock.hidden = true

    })

    document.getElementById("btnClear").addEventListener('click', function (event) {
        const text = "Apakah Anda Yakin Ingin Mengosongkan Form?"
        if (confirm(text) === true) {

            document.getElementById("txtKodeBarang").value = ""
            document.getElementById("txtNamaBarang").value = ""

            document.getElementById("selectCategory").selectedIndex = 0
            document.getElementById("tanggalExpiredForm").hidden = true

            document.getElementById("inpNewStock").hidden = true

            document.getElementById("inpVerifikasiPegawai").value = ""
            document.getElementById("catatan-tambahan").value = ""

            document.getElementById("inpDateDiterima").value = ""
            document.getElementById("inpDateExp").value = ""

            document.getElementById("gudangA").checked = false
            document.getElementById("gudangB").checked = false
            document.getElementById("gudangC").checked = false

            document.getElementById("inpAvailability").checked =false
            document.getElementById("inpInAvailability").checked =false
        }
    })

})
