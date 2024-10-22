document.addEventListener("DOMContentLoaded", function () {
  getProvinsi();
  const provinsiDropDown = document.getElementById("provinsi");
  const kabupatenDropDown = document.getElementById("kabkota");
  const kecamatanDropDown = document.getElementById("kecamatan");
  const kelurahanDropDown = document.getElementById("kelurahan");
  provinsiDropDown.addEventListener("change", function () {
    let element = this.querySelector(":checked");
    kabupatenDropDown.innerHTML = `<option value = ""> Kabupaten</option>`;
    getKabupaten(element.value);
  });
  kabupatenDropDown.addEventListener("change", function () {
    let element = this.querySelector(":checked");
    kecamatanDropDown.innerHTML = `<option value = ""> Kecamatan</option>`;
    getKecamatan(element.value);
  });
  kecamatanDropDown.addEventListener("change", function () {
    let element = this.querySelector(":checked");
    kecamatanDropDown.innerHTML = `<option value = ""> Kelurahan</option>`;
    getKelurahan(element.value);
  });
});

function getProvinsi() {
  const provinsiDropDown = document.getElementById("provinsi");
  fetch("http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
    .then((response) => response.json())
    .then((response) => {
      let prov = "";
      response.forEach(
        (p) => (prov += `<option value="${p.id}">${p.name}</option>`)
      );
      provinsiDropDown.innerHTML += prov;
    });
}

function getKabupaten(id) {
  const kabupatenDropDown = document.getElementById("kabkota");
  fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
      let kabkota = "";
      response.forEach(
        (k) => (kabkota += `<option value = "${k.id}">${k.name}</option>`)
      );
      kabupatenDropDown.innerHTML = kabkota;
    });
}

function getKecamatan(id) {
  const kecamatanDropDown = document.getElementById("kecamatan");
  fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
      let kec = "";
      response.forEach(
        (kc) => (kec += `<option value = "${kc.id}">${kc.name}</option>`)
      );
      kecamatanDropDown.innerHTML = kec;
    });
}

function getKelurahan(id) {
  const kelurahanDropDown = document.getElementById("kelurahan");
  fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
      let kel = "";
      response.forEach(
        (kl) => (kel += `<option value = "${kl.id}">${kl.name}</option>`)
      );
      kelurahanDropDown.innerHTML = kel;
    });
}
