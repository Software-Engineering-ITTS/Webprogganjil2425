document.addEventListener("DOMContentLoaded", function (){
    getProvinsi()
    const provinsiDropDown = document.getElementById("provinsi")
    const kabupatenDropDown = document.getElementById("kabupaten")
    const kecamatanDropDown = document.getElementById("kecamatan")
    const kelurahanDropDown = document.getElementById("kelurahan")

    provinsiDropDown.addEventListener('change', function(){
    kabupatenDropDown.innerHTML =`<option value="">kabupaten</option>`
    kecamatanDropDown.innerHTML =`<option value="">kecamatan</option>`
    kelurahanDropDown.innerHTML =`<option value="">kelurahan</option>`
     let element = this.querySelector(':checked');    
      getKabupaten(element.value);
    })
    kabupatenDropDown.addEventListener('change',function (){
       kelurahanDropDown.innerHTML =`<option value="">kelurahan</option>`
        kecamatanDropDown.innerHTML =`<option value="">kecamatan</option>`
        let element = this.querySelector(':checked');
        getkecamatan(element.value);
    })
    kecamatanDropDown.addEventListener('change',function (){
        kelurahanDropDown.innerHTML =`<option value="">kelurahan</option>`
        let element = this.querySelector(':checked');
        getkelurahan(element.value);

 })
})
 
function getProvinsi(){
 const provinsiDropDown = document.getElementById("provinsi")
 fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`) 
 .then(response => response.json())
 .then(response => {
     let prov = '';
     response.forEach(p => prov+= `<option value="${p.id}">${p.name}</option>`);
     provinsiDropDown.innerHTML += prov 
 
     
 });
}

function getKabupaten(id){
 const kabupatenDropDown = document.getElementById("kabupaten")
 fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`) 
 .then(response => response.json())
 .then(response => {
     let kabu = '';
     response.forEach(k => kabu+= `<option value="${k.id}">${k.name}</option>`);
     kabupatenDropDown.innerHTML += kabu

    })
}
function getkecamatan(id){
    const kabupatenDropDown = document.getElementById("kecamatan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`) 
    .then(response => response.json())
    .then(response => {
        let kec = '';
        response.forEach(k => kec += `<option value="${k.id}">${k.name}</option>`);
        kabupatenDropDown.innerHTML += kec
   
       })
   }
   function getkelurahan(id){
    const kelurahanDropDown = document.getElementById("kelurahan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`) 
    .then(response => response.json())
    .then(response => {
        let kel = '';
        response.forEach(k => kel += `<option value="${k.id}">${k.name}</option>`);
        kelurahanDropDown.innerHTML += kel;
   })

   }