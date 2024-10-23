document.addEventListener("DOMContentLoaded", function () {
  getProvinsi()
  const provinsiDropDown = document.getElementById("provinsi")
  const KabupatenDropDown = document.getElementById("kabupaten")
  const KecamatanDropDown = document.getElementById("kecamatan")
  const KelurahanDropDown = document.getElementById("kelurahan")

  provinsiDropDown.addEventListener(`change`, function() {
    KabupatenDropDown.innerHTML =  `<option value="">Kabupaten</option>`
    KecamatanDropDown.innerHTML =  `<option value="">Kecamatan</option>`
    KelurahanDropDown.innerHTML =  `<option value="">Kelurahan</option>`
    let element = this.querySelector(':checked');
    getKabupaten(element.value);
   })
  KabupatenDropDown.addEventListener('change', function(){
    KecamatanDropDown.innerHTML =  `<option value="">Kecamatan</option>`
    KelurahanDropDown.innerHTML = '<option value="">Kelurahan</option>';
    let element = this.querySelector(':checked');
    getKecamatan(element.value);
  })
  KecamatanDropDown.addEventListener('change', function() {
    KelurahanDropDown.innerHTML = '<option value="">Kelurahan</option>';
    let element = this.querySelector(':checked');
    getKelurahan(element.value);
  });
});


function getProvinsi(){
    const provinsiDropDown = document.getElementById("provinsi")
    fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
    .then(Response => Response.json())
    .then(Response => {
        let prov = '';
        Response.forEach(p =>  prov+= `<option value="${p.id}">${p.name}</option>`); 
        provinsiDropDown.innerHTML += prov
    });
}

function getKabupaten(id){
    const KabupatenDropDown = document.getElementById("kabupaten")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
    .then(Response => Response.json())
    .then(Response =>{
        console.log(Response);
        let kabu = '';
        Response.forEach(k => kabu+= `<option value=${k.id}>${k.name}</option>`);
        KabupatenDropDown.innerHTML += kabu
    })
}

function getKecamatan(id){
    const KecamatanDropDown = document.getElementById("kecamatan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
    .then(Response => Response.json())
    .then(Response =>{
        console.log(Response);
        let kecamatan = '';
        Response.forEach(k => kecamatan+= `<option value=${k.id}>${k.name}</option>`);
        KecamatanDropDown.innerHTML += kecamatan;
    })
}

function getKelurahan(id){
    const KelurahanDropDown = document.getElementById("kelurahan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
    .then(Response => Response.json())
    .then(Response =>{
        console.log(Response);
        let kelurahan = '';
        Response.forEach(k => kelurahan+= `<option value=${k.id}>${k.name}</option>`);
        KelurahanDropDown.innerHTML += kelurahan;
    })
}