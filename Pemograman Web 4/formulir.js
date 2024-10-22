document.addEventListener("DOMContentLoaded", function () {
    getProvinsi()
    const kelurahanDropDown = document.getElementById("kelurahan")
    const provinsiDropDown = document.getElementById("provinsi")
    provinsiDropDown.addEventListener('change', function () {
        kabupatenDropDown.innerHTML = `<option value="">Kabupaten</option>`
        kecamatanDropDown.innerHTML = `<option value="">Kecamatan</option>`
        kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`
        let element = this.querySelector(":checked");
        console.log(element);
        getKabupaten(element.value)
    })
    const kabupatenDropDown = document.getElementById("kabupaten")
    kabupatenDropDown.addEventListener('change', function () {
        kecamatanDropDown.innerHTML = `<option value="">Kecamatan</option>`
        kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`
        let element = this.querySelector(":checked");
        console.log(element);
        getKecamatan(element.value)
    })
    const kecamatanDropDown = document.getElementById("kecamatan")
    kecamatanDropDown.addEventListener('change', function () {
        kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`
        let element = this.querySelector(":checked");
        console.log(element);
        getKelurahan(element.value)
    })
})

function getProvinsi() {
    const provinsiDropDown = document.getElementById("provinsi")
    fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
        .then(response => response.json())
        .then(response => {
            let prov = '';
            response.forEach(p => prov += `<option value="${p.id}">${p.name}</option>`);
            provinsiDropDown.innerHTML += prov
        })
}

function getKabupaten(id) {
    const kabupatenDropDown = document.getElementById("kabupaten")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
        .then(response => response.json())
        .then(response => {
            let kabu = '';
            response.forEach(k => kabu += `<option value="${k.id}">${k.name}</option>`);
            kabupatenDropDown.innerHTML += kabu
        })
}

function getKecamatan(id) {
    const kecamatanDropDown = document.getElementById("kecamatan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
        .then(response => response.json())
        .then(response => {
            let keca = '';
            response.forEach(c => keca += `<option value="${c.id}">${c.name}</option>`);
            kecamatanDropDown.innerHTML += keca
        })
}

function getKelurahan(id) {
    const kelurahanDropDown = document.getElementById("kelurahan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
        .then(response => response.json())
        .then(response => {
            let kelu = '';
            response.forEach(kel => kelu += `<option value="${kel.id}">${kel.name}</option>`);
            kelurahanDropDown.innerHTML += kelu
        })
}