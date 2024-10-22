document.addEventListener("DOMContentLoaded", function () {
    getProvinsi();
    const provinsiDropDown = document.getElementById("Prov")
    const kabupatenDropDown = document.getElementById("Kab")
    const kecamatanDropDown = document.getElementById("Kec")
    const kelurahanDropDown = document.getElementById("Kel")
    provinsiDropDown.addEventListener('change', function () {
        kabupatenDropDown.innerHTML = `<option value="">Kabupaten</option>`
        kecamatanDropDown.innerHTML = `<option value="">Kecamatan</option>`
        kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`
        let element = this.querySelector(':checked')
        getKabupaten(element.value);
    })
    kabupatenDropDown.addEventListener('change', function () {
        kecamatanDropDown.innerHTML = `<option value="">Kecamatan</option>`
        kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`
        let element = this.querySelector(':checked')
        getKecamatan(element.value);
    })
    kecamatanDropDown.addEventListener('change', function () {
        kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`
        let element = this.querySelector(':checked')
        getKelurahan(element.value);
    })
});

  function getProvinsi() {
    const provinsiDropDown = document.getElementById("Prov");
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
      .then((response) => response.json())
      .then((response) => {
        let prov = "";
        response.forEach(
          (p => prov += `<option value="${p.id}">${p.name}</option>`)
        );
        provinsiDropDown.innerHTML += prov;
      });
  }

  function getKabupaten(id) {
    const kabupatenDropDown = document.getElementById("Kab");
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
      .then((response) => response.json())
      .then((response) => {
        let kab = "";
        response.forEach(
          (kb => kab += `<option value="${kb.id}">${kb.name}</option>`)
        );
        kabupatenDropDown.innerHTML += kab;
      });
  }

  function getKecamatan(id) {
    const kecamatanDropDown = document.getElementById("Kec");
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
      .then((response) => response.json())
      .then((response) => {
        let kec = "";
        response.forEach(
          (kc => kec += `<option value="${kc.id}">${kc.name}</option>`)
        );
        kecamatanDropDown.innerHTML += kec;
      });
  }
  function getKelurahan(id) {
    const kelurahanDropDown = document.getElementById("Kel");
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
      .then((response) => response.json())
      .then((response) => {
        let kel = "";
        response.forEach(
          (kl => kel += `<option value="${kl.id}">${kl.name}</option>`)
        );
        kelurahanDropDown.innerHTML += kel;
      });
  }

