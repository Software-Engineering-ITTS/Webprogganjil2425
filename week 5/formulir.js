document.addEventListener("DOMContentLoaded", function () {
    getProvinsi()
    const provinsiDropDown = document.getElementById("Provinsi")
    const kabupatenDropDown = document.getElementById("Kabupaten")
    const kecamatanDropDown = document.getElementById("Kecamatan")
    const kelurahanDropDown = document.getElementById("Kelurahan")
  
    provinsiDropDown.addEventListener('change', function(){
      kabupatenDropDown.innerHTML = `<option value="">Kabupaten</option>`
      kecamatanDropDown.innerHTML = `<option value="">Kecamatan</option>`
      let element = this.querySelector(':checked');
      getKabupaten(element.value);
    })
  
    kabupatenDropDown.addEventListener('change', function() {
      kecamatanDropDown.innerHTML = `<option value="">Kecamatan</option>`
      let element = this.querySelector(':checked');
      getKecamatan(element.value);
    })

    kecamatanDropDown.addEventListener('change', function() {
        kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`
        let element = this.querySelector(':checked');
        getKelurahan(element.value);
    })

  })
  
  function getProvinsi(){
    const provinsiDropDown = document.getElementById("Provinsi")
    fetch (`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then(response => response.json())
    .then(response => {
      let prov = '';
      response.forEach(p => prov+=`<option value="${p.id}">${p.name}</option>`);
      provinsiDropDown.innerHTML = prov
    })
}
  
  function getKabupaten(id){
    const kabupatenDropDown = document.getElementById("Kabupaten")
    fetch (`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
    .then(response => response.json())
    .then(response => {
      let kabu = '';
      response.forEach(p => kabu+=`<option value="${p.id}">${p.name}</option>`);
      kabupatenDropDown.innerHTML = kabu
    })
  }
  
  function getKecamatan(id){
    const kecamatanDropDown = document.getElementById("Kecamatan")
    fetch (`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
    .then(response => response.json())
    .then(response => {
      let kecamatan = '';
      response.forEach(p => kecamatan+=`<option value="${p.id}">${p.name}</option>`);
      kecamatanDropDown.innerHTML = kecamatan
    })
  }

  function getKelurahan(id){
    const kelurahanDropDown = document.getElementById("Kelurahan")
    fetch (`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
    .then(response => response.json())
    .then(response => {
      let kelurahan = '';
      response.forEach(p => kelurahan+=`<option value="${p.id}">${p.name}</option>`);
      kelurahanDropDown.innerHTML = kelurahan
    })
  }