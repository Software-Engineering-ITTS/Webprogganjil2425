document.addEventListener("DOMContentLoaded", function () {


    const provinsiDropDown = this.getElementById("provinsi")
    const kabupatenDropDown = this.getElementById("kabupaten")
    const kecamatanDropDown = this.getElementById("kecamatan")
    const kelurahanDropDown = this.getElementById("kelurahan")

    getProvinsi(provinsiDropDown);

    provinsiDropDown.addEventListener("change", function () {
        let provId = this.selectedOptions[0].value
        getKabupaten(provId, kabupatenDropDown)
    });

    kabupatenDropDown.addEventListener("change", function () {
        let kabId = this.selectedOptions[0].value
        getKecamatan(kabId, kecamatanDropDown)
    });

    kecamatanDropDown.addEventListener("change", function(){
        let kecId = this.selectedOptions[0].value
        getKelurahan(kecId, kelurahanDropDown)
    })

})

function getKelurahan(kecId, keluarahanDropdown) {

    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecId}.json`)
    .then(response => response.json())
    .then(response => {
        let kel = '';
        response.forEach(element => {            
            kel += `<option value="${element.id}">${element.name}</option>`
        });
        keluarahanDropdown.innerHTML = "<option >Pilih Kelurahan</option>"
        keluarahanDropdown.innerHTML += kel
    });
}

function getKecamatan(kabId, kecamatanDropDown) {
    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabId}.json`)
    .then(response => response.json())
    .then(response => {
        let kec = '';
        response.forEach(element => {
            kec += `<option value="${element.id}">${element.name}</option>`

        });
        kecamatanDropDown.innerHTML = "<option >Pilih Kecamatan</option>"
        kecamatanDropDown.innerHTML += kec
    });
}

function getKabupaten(provId, kabupatenDropDown) {
    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provId}.json`)
        .then(response => response.json())
        .then(response => {
            let kab = '';
            response.forEach(element => {
                kab += `<option value="${element.id}">${element.name}</option>`

            });
            kabupatenDropDown.innerHTML = "<option >Pilih Kabupaten</option>"
            kabupatenDropDown.innerHTML += kab
        });
}

function getProvinsi(provinsiDropDown) {

    fetch("http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
        .then(response => response.json())
        .then(response => {
            let prov = '';
            response.forEach(element => {
                prov += `<option value="${element.id}">${element.name}</option>`

            });
            provinsiDropDown.innerHTML = "<option >Pilih Provinsi</option>"
            provinsiDropDown.innerHTML += prov
        });
}
