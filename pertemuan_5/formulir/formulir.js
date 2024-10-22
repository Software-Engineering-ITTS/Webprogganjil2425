document.addEventListener("DOMContentLoaded", function() {
    getProvinsi()
    const provinsiDropdown = document.getElementById("provinsi")
    const kabupatenDropdown = document.getElementById("kabupaten")
    const kecamatanDropdown = document.getElementById("kecamatan")
    const kelurahanDropdown = document.getElementById("kelurahan")

    provinsiDropdown.addEventListener('change', function(){
        kabupatenDropdown.innerHTML = '<option value="">Kabupaten</option>'
        kecamatanDropdown.innerHTML = '<option value="">Kecamatan</option>'
        let element = this.querySelector(':checked')
        getKabupaten(element.value)
    })
    kabupatenDropdown.addEventListener('change', function(){
        kecamatanDropdown.innerHTML = '<option value="">Kecamatan</option>'
        let element = this.querySelector(':checked')
        getKecamatan(element.value)
    })
    kelurahanDropdown.addEventListener('change', function(){
        kelurahanDropdown.innerHTML = '<option value="">Kelurahan</option>'
        let element = this.querySelector(':checked')
        getKelurahan(element.value)
    })
    
})

function getProvinsi(){
    const provinsiDropdown = document.getElementById("provinsi")
    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then(response => response.json()
    .then(response => {
        let prov =''
        response.forEach(p => prov+=`<option value="${p.id}">${p.name}</option>`)
        provinsiDropdown.innerHTML = prov
    }))
}

function getKabupaten(id){
    const kabupatenDropdown = document.getElementById("kabupaten")
    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
    .then(response => response.json())
    .then(response => {
        let kab = ''
        response.forEach(ka => kab+=`<option value="${ka.id}">${ka.name}</option>`)
        kabupatenDropdown.innerHTML += kab
    })
}

function getKecamatan(id){
    const kecamatanDropdown = document.getElementById("kecamatan")
    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
    .then(response => response.json())
    .then(response => {
        let kec = ''
        response.forEach(ke => kec+=`<option value="${ke.id}">${ke.name}</option>`)
        kecamatanDropdown.innerHTML += kec
    })
}

function getKelurahan(id){
    const kelurahanDropdown = document.getElementById("kelurahan")
    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
    .then(response => response.json())
    .then(response => {
        let kel = ''
        response.forEach(kelu => kel+=`<option value="${kelu.id}">${kelu.name}</option>`)
        kelurahanDropdown.innerHTML += kel
    })
}


