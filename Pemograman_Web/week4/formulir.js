document.addEventListener("DOMContentLoaded", function () {
  getProvinsi();
  
  const provinsiDropDown = document.getElementById("provinsi");
  const kabupatenDropDown = document.getElementById("kabupaten");
  const kecamatanDropDown = document.getElementById("kecamatan");
  const kelurahanDropDown = document.getElementById("kelurahan");

  provinsiDropDown.addEventListener("change", function () {
    kabupatenDropDown.innerHTML = `<option value="">Kabupaten</option>`;
    kecamatanDropDown.innerHTML = `<option value="">Kecamatan</option>`;
    kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`;
    let element = this.querySelector(':checked');
        getKabupaten(element.value);

  });

  kabupatenDropDown.addEventListener("change", function () {
    kecamatanDropDown.innerHTML = `<option value="">Kecamatan</option>`;
    kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`;
    let element = this.querySelector(':checked');
        getKecamatan(element.value);

  });

  kecamatanDropDown.addEventListener("change", function () {
    kelurahanDropDown.innerHTML = `<option value="">Kelurahan</option>`;
    let element = this.querySelector(':checked');
        getKelurahan(element.value);

  });
});

function getProvinsi() {
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then(response => response.json())
    .then(data => {
      const provinsiDropDown = document.getElementById("provinsi");
      let provOptions = `<option value="">Pilih Provinsi</option>`;
      data.forEach(prov => {
        provOptions += `<option value="${prov.id}">${prov.name}</option>`;
      });
      provinsiDropDown.innerHTML = provOptions;
    })
}

function getKabupaten(provinsiId) {
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`)
    .then(response => response.json())
    .then(data => {
      const kabupatenDropDown = document.getElementById("kabupaten");
      let kabOptions = `<option value="">Pilih Kabupaten</option>`;
      data.forEach(kab => {
        kabOptions += `<option value="${kab.id}">${kab.name}</option>`;
      });
      kabupatenDropDown.innerHTML = kabOptions;
    })
}

function getKecamatan(kabupatenId) {
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenId}.json`)
    .then(response => response.json())
    .then(data => {
      const kecamatanDropDown = document.getElementById("kecamatan");
      let kecOptions = `<option value="">Pilih Kecamatan</option>`;
      data.forEach(kec => {
        kecOptions += `<option value="${kec.id}">${kec.name}</option>`;
      });
      kecamatanDropDown.innerHTML = kecOptions;
    })
}

function getKelurahan(kecamatanId) {
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`)
    .then(response => response.json())
    .then(data => {
      const kelurahanDropDown = document.getElementById("kelurahan");
      let kelOptions = `<option value="">Pilih Kelurahan</option>`;
      data.forEach(kel => {
        kelOptions += `<option value="${kel.id}">${kel.name}</option>`;
      });
      kelurahanDropDown.innerHTML = kelOptions;
    })
}
