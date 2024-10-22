document.addEventListener("DOMContentLoaded", function () {


    const provinsiDropDown = this.getElementById("provinsi")
    const kabupatenDropDown = this.getElementById("kabupaten")
    const kecamatanDropDown = this.getElementById("kecamatan")

    getProvinsi(provinsiDropDown);

    provinsiDropDown.addEventListener("change", function () {
        let provId = provinsiDropDown.selectedOptions[0].value
        getKabupaten(provId, kabupatenDropDown)
    });

    kabupatenDropDown.addEventListener("change", function () {
        let kabId = kabupatenDropDown.selectedOptions[0].value
        getKecamatan(kabId, kecamatanDropDown)
    });

})

function getKecamatan(kabId, kecamatanDropDown) {
    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabId}.json`)
    .then(response => response.json())
    .then(response => {
        let kec = '';
        response.forEach(element => {
            kec += `<option value="${element.id}">${element.name}</option>`

        });
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
            provinsiDropDown.innerHTML += prov
        });
}
