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
    // document.getElementById("btnSubmit").addEventListener('click', function (event) {
    //         console.log("Submit is clicked")
    
    //         const noVerif = document.getElementById("inpVerifikasiPegawai")
    //         if(noVerif.value === ''){
    //             alert("Masukkan Kode Verifikasi dulu")
    //         }
    // })
    // document.getElementById("btnSubmit").addEventListener('click', function (event) {
    //     console.log("Submit is clicked")

    //     const noVerif = document.getElementById("inpVerifikasiPegawai")
    //     if(noVerif.value === ''){
    //         alert("Masukkan Kode Verifikasi dulu")
    //         return
    //     }else{
            
    //         // SEND THE FORM DATA INTO simpandata.php 
            

    //         // ambil form data
    //         const formData = new FormData();
    //         formData.append("id_barang", document.getElementById("id_barang").value);
    //         formData.append("kode_barang", document.getElementById("txtKodeBarang").value);
    //         formData.append("nama_barang", document.getElementById("txtNamaBarang").value);
    //         formData.append("kategori_barang", document.getElementById("selectCategory").value);
    //         formData.append("tanggal_diterima", document.getElementById("inpDateDiterima").value);
    //         formData.append("tanggal_expired", document.getElementById("inpDateExp").value);
        
    //         // getting radio buttons data for availability
    //         const availability = document.querySelector('input[name="availability"]:checked');
    //         formData.append("status_available", availability ? availability.value : "");
        
    //         const stockBarangInput = document.getElementById("inpStockBarang");
    //         formData.append("stock", stockBarangInput ? stockBarangInput.value : "0");
        
    //         // getting checkboxes data for gudang
    //         const gudangs = document.querySelectorAll('input[name="gudang"]:checked');
    //         const gudangValues = Array.from(gudangs).map(input => input.id); // Get the IDs of checked gudangs
    //         formData.append("gudang_penyimpanan", JSON.stringify(gudangValues));
        
            
    //         formData.append("catatan_tambahan", document.getElementById("catatan-tambahan").value);
        
    //         // Employee verification number
    //         formData.append("verifikasi_pegawai", document.getElementById("inpVerifikasiPegawai").value);
        
            
    //         const formRequest = new XMLHttpRequest();

    //         console.log("Send Data");
    //         console.log(formRequest);

    //         // // open request to simpandata.php
    //         // formRequest.open("POST", "simpandata.php", true);
        
    //         // // create callback here
    //         // formRequest.onreadystatechange = function () {
    //         //     if (xhr.readyState === 4 && xhr.status === 200) {
    //         //         alert("Response from server: " + xhr.responseText);
    //         //     }
    //         // };

    //         // // initiate send data
    //         // xhr.send(formData);

    //     }
        
    // })

})
