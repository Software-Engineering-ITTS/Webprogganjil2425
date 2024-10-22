document.addEventListener("DOMContentLoaded", function() {
getprovinsi()
const provinsiDropDown = document.getElementById("provinsi")
const kabupatenDropDown = document.getElementById("kabupaten")
const kecamatanDropDown = document.getElementById("kecamatan")
const kelurahanDropDown = document.getElementById("kelurahan")


provinsiDropDown.addEventListener('change', function() {
    kabupatenDropDown.innerHTML = '<option value="">kabupaten</option>'
    kecamatanDropDown.innerHTML = '<option value="">kecamatan</option>'
      let element = this.querySelector(':checked');
        getkabupaten(element.value);
})
kabupatenDropDown.addEventListener('change', function() {
    kecamatanDropDown.innerHTML = '<option value="">kecamatan</option>'
 let element = this.querySelector(':checked');
     getkecamatan(element.value);
})

kecamatanDropDown.addEventListener('change', function() {
    kelurahanDropDown.innerHTML = '<option value="">kelurahan</option>';
    let element = this.querySelector(':checked');
    getkelurahan(element.value); // 
});


// kelurahanDropDown.addEventListener('change', function() {
//     kelurahanDropDown.innerHTML = '<option value="">kelurahan</option>'
//  let element = this.querySelector(':checked');
//      getkelurahan(element.value);
// })


});

function getprovinsi(){
const provinsiDropDown = document.getElementById("provinsi")
fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
.then(response => response.json())
.then(response => {
    let prov = '';
    response.forEach(p => prov+= `<option value="${p.id}">${p.name}</option>`);
    provinsiDropDown.innerHTML += prov
    
})
}

function getkabupaten(id) {
const kabupatenDropDown = document.getElementById("kabupaten")
fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
.then(response => response.json())
.then(response => {
    let kabu = '';
    response.forEach(k => kabu+= `<option value=${k.id}>${k.name}</option>`);
    kabupatenDropDown.innerHTML += kabu
    
})
}

function getkecamatan(id) {
const kecamatanDropDown = document.getElementById("kecamatan")
fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
.then(response => response.json())
.then(response => {
    let kecamatan = '';
    response.forEach(k => kecamatan+= `<option value=${k.id}>${k.name}</option>`);
    kecamatanDropDown.innerHTML += kecamatan;
    
})
}

function getkelurahan(id) {
const kelurahanDropDown = document.getElementById("kelurahan")
fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
.then(response => response.json())
.then(response => {
    let kelurahan = '';
    response.forEach(k => kelurahan+= `<option value=${k.id}>${k.name}</option>`);
    kelurahanDropDown.innerHTML += kelurahan;
    
})
}



// document.addEventListener("DOMContentLoaded", function(){
    
//     const provinsiView = document.getElementById("provinsi") 
//     fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
//     .then(response => response.json())
//     .then(response => {
    //         response.forEach(p => {
        //             console.log(p)
        //             let prov = '';
//             response.forEach(p => prov+= <option value="${p.id}">${p.name}</option>);
//             provinsiView.innerHTML = prov
//         });
//     })
    
//     // console.log(provinsiView) 
// })