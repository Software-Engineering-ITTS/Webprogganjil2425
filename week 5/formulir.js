document.addEventListener("DOMContentLoaded", function () {
  getPROVINSI();
  const PROVINSIDropDown = document.getElementById("PROVINSI");
  const KECAMATANDropDown = document.getElementById("KECAMATAN");
  const KABUPATENDropDown = document.getElementById("KABUPATEN");
  const KELURAHANDropDown = document.getElementById("KELURAHAN");

  PROVINSIDropDown.addEventListener('change', function() {
      KABUPATENDropDown.innerHTML = `<option value="">KABUPATEN</option>`;
      KECAMATANDropDown.innerHTML = `<option value="">KECAMATAN</option>`;
      KELURAHANDropDown.innerHTML = `<option value="">KELURAHAN</option>`;
      let element = this.querySelector(':checked'); 
      getKABUPATEN(element.value);
  });

  KABUPATENDropDown.addEventListener('change', function() {
      KECAMATANDropDown.innerHTML = `<option value="">KECAMATAN</option>`;
      KELURAHANDropDown.innerHTML = `<option value="">KELURAHAN</option>`;
      let element = this.querySelector(':checked'); 
      getKECAMATAN(element.value);
  });

  KECAMATANDropDown.addEventListener('change', function() {
      KELURAHANDropDown.innerHTML = `<option value="">KELURAHAN</option>`;
      let element = this.querySelector(':checked'); 
      getKELURAHAN(element.value);
  });
});

function getPROVINSI() {
  const PROVINSIDropDown = document.getElementById("PROVINSI");
  fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
      .then(response => response.json())
      .then(response => {
          let prov = '';
          response.forEach(p => prov += `<option value="${p.id}">${p.name}</option>`); 
          PROVINSIDropDown.innerHTML += prov;
      });
}

function getKABUPATEN(id) {
  const KABUPATENDropDown = document.getElementById("KABUPATEN");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
      .then(response => response.json())
      .then(response => {
          let kabu = '';
          response.forEach(k => kabu += `<option value="${k.id}">${k.name}</option>`); 
          KABUPATENDropDown.innerHTML += kabu;
      });
}

function getKECAMATAN(id) {
  const KECAMATANDropDown = document.getElementById("KECAMATAN");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
      .then(response => response.json())
      .then(response => {
          let kecamatan = '';
          response.forEach(k => kecamatan += `<option value="${k.id}">${k.name}</option>`); 
          KECAMATANDropDown.innerHTML += kecamatan;
      });
}

function getKELURAHAN(id) {
  const KELURAHANDropDown = document.getElementById("KELURAHAN");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
      .then(response => response.json())
      .then(response => {
          let kelurahan = '';
          response.forEach(k => kelurahan += `<option value="${k.id}">${k.name}</option>`);
          KELURAHANDropDown.innerHTML += kelurahan;
      });
}