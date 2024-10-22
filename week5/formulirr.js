document.addEventListener("DOMContentLoaded", function () {
  getPrivinsi();
  const provinsiView = document.getElementById("provinsi");
  const kabupatenView = document.getElementById("kabupaten");
  const kecamatanView = document.getElementById("kecamatan");
  const kelurahanView = document.getElementById("kelurahan");

  
  provinsiView.addEventListener("change", function () {
    kabupatenView.innerHTML= `<option value="">kabupaten</option>`
    kecamatanView.innerHTML= `<option value="">kecamatan</option>`
    kelurahanView.innerHTML= `<option value="">kelurahan</option>`
    let elmene = this.querySelector(":checked");
    getKabupaten(elmene.value);
  });

  kabupatenView.addEventListener("change", function () {
    kecamatanView.innerHTML = `<option value="">kecamatan</option>`
    kelurahanView.innerHTML = `<option value="">kelurahan</option>`

    let elmene = this.querySelector(":checked");
    getKecamatan(elmene.value);
  });
  kecamatanView.addEventListener("change", function () {
    kelurahanView.innerHTML = `<option value="">kelurahan</option>`

    let elmene = this.querySelector(":checked");
    getKelurahan(elmene.value);
  });

  // console.log(provinsiView)
});

function getPrivinsi() {
  const provinsiView = document.getElementById("provinsi");
  fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
    .then((response) => response.json())
    .then((response) => {
      response.forEach((p) => {
        console.log(p);
        let prov = "";
        response.forEach(
          (p) => (prov += `<option value="${p.id}">${p.name}</option>`)
        );
        provinsiView.innerHTML += prov;
      });
    });
}

function getKabupaten(id) {
  const kabupatenView = document.getElementById("kabupaten");
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
      let kab = "";
      response.forEach(
        (kb) => (kab += `<option value="${kb.id}">${kb.name}</option>`)
      );
      kabupatenView.innerHTML += kab;
    });
}

function getKecamatan(id){
    const kecamatanView = document.getElementById("kecamatan");
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
        let kec = "";
      response.forEach(
        (kc) => (kec += `<option value="${kc.id}">${kc.name}</option>`)
      );
      kecamatanView.innerHTML += kec;
    })

}

function getKelurahan(id){
    const kelurahanView = document.getElementById("kelurahan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
    .then((response) => response.json())
    .then((response) => {
        let kel = "";
        response.forEach(
            (kl) => (kel+= `<option value="${kl.id}">${kl.name}</option>`)
        )
        kelurahanView.innerHTML += kel ;
    })
}
