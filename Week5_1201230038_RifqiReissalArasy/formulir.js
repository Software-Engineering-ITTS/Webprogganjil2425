document.addEventListener("DOMContentLoaded", function(){
    getProvinsi()
    const provinsiDropdown = document.getElementById("provinsi")
    const KecamatanDropdown = document.getElementById("kecamatan")
    const KabupatenDropdown = document.getElementById("kabupaten")
    const KelurahanDropdown = document.getElementById("kelurahan")

    provinsiDropdown.addEventListener('change', function(){
        KabupatenDropdown.innerHTML = `<option value="">Kabupaten</option>`
        KecamatanDropdown.innerHTML = `<option value="">Kecamatan</option>`
        KelurahanDropdown.innerHTML = `<option value="">Kelurahan</option>`
        let element = this.querySelector(':checked');
        getKabupaten(element.value);
    })

    KabupatenDropdown.addEventListener('change', function(){
        let element = this.querySelector(':checked');
        getKecamatan(element.value);
    })

    KecamatanDropdown.addEventListener('change', function(){
        let element = this.querySelector(':checked');
        getKelurahan(element.value);
    })
})

function getProvinsi(){
    const provinsiDropdown = document.getElementById("provinsi")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then(response => response.json())
    .then(response => {
        let prov = '';
        response.forEach(p => prov+=`<option value="${p.id}">${p.name}</option>`);
        provinsiDropdown.innerHTML += prov
    });
}

function getKabupaten(id){
        const kabupatenDropdown = document.getElementById("kabupaten")
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
        .then(response => response.json())
        .then(response => {
            let kabu = '';
            response.forEach(k => kabu+=`<option value="${k.id}">${k.name}</option>`);
            kabupatenDropdown.innerHTML += kabu
        });
}

function getKecamatan(id){
    const kecamatanDropdown = document.getElementById("kecamatan")
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
        .then(response => response.json())
        .then(response => {
            let kecamatan = '';
            response.forEach(k => kecamatan+=`<option value="${k.id}">${k.name}</option>`);
            kecamatanDropdown.innerHTML += kecamatan
        });
}

function getKelurahan(id){
    const kelurahanDropdown = document.getElementById("kelurahan")
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
        .then(response => response.json())
        .then(response => {
            let kelurahan = '';
            response.forEach(k => kelurahan+=`<option value="${k.id}">${k.name}</option>`);
            kelurahanDropdown.innerHTML += kelurahan
        });
}

