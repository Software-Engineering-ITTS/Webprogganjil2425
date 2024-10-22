document.addEventListener("DOMContentLoaded", function () {
  getprovinsi();
  const provinsiDropdown = document.getElementById("provinsi");
  const KabupatenDropdown = document.getElementById("Kabupaten");
  const KecamatanDropdown = document.getElementById("Kecamatan");
  const KelurahanDropdown = document.getElementById("Kelurahan");

  provinsiDropdown.addEventListener("change", function () {
    let element = this.querySelector(":checked");
    getKabupaten(element.value);
  });
  KabupatenDropdown.addEventListener("change", function () {
    KecamatanDropdown.innerHTML = `<option value="">kecamatan</option>`;
    let element = this.querySelector(":checked");
    Kecamatan(element.value);
  });
  KecamatanDropdown.addEventListener("change", function () {
    KelurahanDropdown.innerHTML = `<option value="">kelurahan</option>`;
    let element = this.querySelector(":checked");
    Kelurahan(element.value);
  });
});

function getprovinsi() {
  const provinsiDropdown = document.getElementById("provinsi");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then((response) => response.json())
    .then((response) => {
      let prov = "";
      response.forEach(
        (p) => (prov += `<option value="${p.id}">${p.name}</option>`)
      );
      provinsiDropdown.innerHTML = prov;
    });
}

function getKabupaten(id) {
  const KabupatenDropdown = document.getElementById("Kabupaten");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
      let kabu = "";
      response.forEach(
        (k) => (kabu += `<option value="${k.id}">${k.name}</option>`)
      );
      KabupatenDropdown.innerHTML = kabu;
    });
}

function Kecamatan(id) {
  const KecamatanDropDown = document.getElementById("Kecamatan");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
      let kec = "";
      response.forEach(
        (ke) => (kec += `<option value="${ke.id}">${ke.name}</option>`)
      );
      KecamatanDropDown.innerHTML += kec;
    });
}

function Kelurahan(id) {
  const KelurahanDropDown = document.getElementById("Kelurahan");
  fetch(
    `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
    let kl = "";
    response.forEach(
      (kel) =>(kl += `<option value="${kel.id}">${kel.name}</option>`)
    )
    KelurahanDropDown.innerHTML +=kl;
  });
}
