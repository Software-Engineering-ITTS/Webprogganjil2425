document.addEventListener("DOMContentLoaded", function () {
  getProvinsi();
  const provinsiDropDown = document.getElementById("provinsi");
  const kabupatenDropDown = document.getElementById("kabupaten");
  const kecamatanDropDown = document.getElementById("kecamatan");
  const kelurahanDropDown = document.getElementById("kelurahan");
  provinsiDropDown.addEventListener("change", function () {
    kabupatenDropDown.innerHTML = `<option value="">Kabupaten</option>`
    kecamatanDropDown.innerHTML = `<option value="">Kecamatan</option>`
    kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`
    let element = this.querySelector(":checked");
    getKabupaten(element.value);
  });
  kabupatenDropDown.addEventListener("change", function () {
    let element = this.querySelector(":checked");
    getKecamatan(element.value);
  });
  kecamatanDropDown.addEventListener("change", function () {
    let element = this.querySelector(":checked");
    getKelurahan(element.value);
  });
});

function getProvinsi() {
  const provinsiDropDown = document.getElementById("provinsi");
  fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
    .then((response) => response.json())
    .then((response) => {
      let prov = "";
      response.forEach(
        (p) => (prov += `<option value = "${p.id}">${p.name}</option>`)
      );
      provinsiDropDown.innerHTML += prov;
    });
}

function getKabupaten(id) {
  const kabupatenDropDown = document.getElementById("kabupaten");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
      let kabu = "";
      response.forEach(
        (k) => (kabu += `<option value = ${k.id}>${k.name}</option>`)
      );
      kabupatenDropDown.innerHTML = kabu;
    });
}

function getKecamatan(id) {
  const kecamatanDropDown = document.getElementById("kecamatan");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
      let kec = "";
      response.forEach(
        (kc) => (kec += `<option value = ${kc.id}>${kc.name}</option>`)
      );
      kecamatanDropDown.innerHTML = kec;
    });
}

function getKelurahan(id) {
  const kelurahanDropDown = document.getElementById("kelurahan");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
      let kel = "";
      response.forEach(
        (kl) => (kel += `<option value = ${kl.id}>${kl.name}</option>`)
      );
      kelurahanDropDown.innerHTML = kel;
    });
}
