document.addEventListener("DOMContentLoaded", function () {
   getProvinsi()
   const provinsiDropDown = document.getElementById("Provinsi")
   const KecamatanDropDown = document.getElementById("Kecamatan")
   const KotaKabupatenDropDown = document.getElementById("Kota_Kabupaten")
   const KelurahanDropDown = document.getElementById("Kelurahan")
   provinsiDropDown.addEventListener('change', function(){
        KotaKabupatenDropDown.innerHTML = `<option value=" ">Kabupaten</option>`
        KecamatanDropDown.innerHTML = `<option value=" ">Kecamatan</option>`
        KelurahanDropDown.innerHTML = `<option value=" ">Kelurahan</option>`
        let element = this.querySelector(':checked');
        KotaKabupaten(element.value);
    });
        KelurahanDropDown.innerHTML = `<option value=" ">Kelurahan</option>`
        KecamatanDropDown.innerHTML = `<option value=" ">Kecamatan</option>`
        KotaKabupatenDropDown.addEventListener('change', function(){
        let element1 = this.querySelector(':checked');
        Kecamatan(element1.value); 
    });
        KelurahanDropDown.innerHTML = `<option value=" ">Kelurahan</option>`
        KecamatanDropDown.addEventListener('change', function(){
        let element2 = this.querySelector(':checked');
        Kelurahan(element2.value);
        });
});

function getProvinsi (){
    const provinsiDropDown = document.getElementById("Provinsi")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then(response => response.json())
    .then(response => {
        let prov = ' ';
        response.forEach(p => prov+=`<option value="${p.id}">${p.name}</option>`);
        provinsiDropDown.innerHTML += prov
    });
}

function KotaKabupaten (id){
    const KotaKabupatenDropDown = document.getElementById("Kota_Kabupaten")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
    .then(response => response.json())
    .then(response => {
        let Kota_Kabupaten = ' ';
        response.forEach(k => Kota_Kabupaten+=`<option value="${k.id}">${k.name}</option>`);
        KotaKabupatenDropDown.innerHTML += Kota_Kabupaten
    });
}

function Kecamatan (id){
    const KecamatanDropDown = document.getElementById("Kecamatan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
    .then(response => response.json())
    .then(response => {
        let Kecamatan = ' ';
        response.forEach(ke => Kecamatan+=`<option value="${ke.id}">${ke.name}</option>`);
        KecamatanDropDown.innerHTML += Kecamatan
    });
}

function Kelurahan (id){
    const KelurahanDropDown = document.getElementById("Kelurahan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
    .then(response => response.json())
    .then(response => {
        let Kelurahan = ' ';
        response.forEach(kel => Kelurahan+=`<option value="${kel.id}">${kel.name}</option>`);
        KelurahanDropDown.innerHTML += Kelurahan
    });
}