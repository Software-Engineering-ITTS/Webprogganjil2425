document.addEventListener("DOMContentLoaded", function () {
    getProvinsi()
    const provinsiDropDown = document.getElementById("provinsi")
    const KabupatenDropDown = document.getElementById("kabupaten")
    const KecamatanDropDown = document.getElementById("kecamatan")
    
    provinsiDropDown.addEventListener('change',function(){
       KabupatenDropDown.innerHTML = `<option value="">Kabupaten</option>`   
       KecamatanDropDown.innerHTML = ` <option value="">Kecamatan</option>`   
            let element = this.querySelector(':checked');
            getKabupaten(element.value);
        })
    KabupatenDropDown.addEventListener('change', function(){
    let element = this.querySelector(':checked');
    getKecamatan(element.value);
})
KecamatanDropDown.addEventListener('change', function(){
    let element = this.querySelector(':checked');
    getKelurahan(element.value);
    })

})
function getProvinsi(){
    const provinsiDropDown = document.getElementById("provinsi")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`) 
    .then(response => response.json())
    .then(response => {
        let prov ='' 
       response.forEach(p => prov+= `<option value="${p.id}">${p.name}</option>`);
       provinsiDropDown.innerHTML += prov
       
    });

} 
    function getKabupaten(id){
        const kabupatenDropDown = document.getElementById("kabupaten")
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
        .then(response => response.json())
        .then(response => {
            let kabu =''; 
            response.forEach(g => kabu+= `<option value="${g.id}">${g.name}</option>`);
            kabupatenDropDown.innerHTML += kabu
        });
}

function getKecamatan(id){
    const kecamatanDropDown = document.getElementById("kecamatan")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
    .then(response => response.json())
    .then(response =>{
        let kecamatan ='';
        response.forEach(k => kecamatan+= `<option value="${k.id}">${k.name}</option>`);
        kecamatanDropDown.innerHTML += kecamatan
    });
    }

    function getKelurahan(id){
        const KelurahanDropDown = document.getElementById("kelurahan")
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
        .then(response => response.json())
        .then(response =>{
            let kelurahan='';
            response.forEach(q => kelurahan+= `<option value="${q.id}">${q.name}</option>`);
            KelurahanDropDown.innerHTML += kelurahan
        }
        
    )
    }
    
