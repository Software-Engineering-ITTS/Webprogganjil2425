document .addEventListener("DOMContentLoaded" , function() {
    getProvinsi()
    const ProvinsiDropDown = document.getElementById("Provinsi")
    const KecamatanDropDown = document.getElementById("Kecamatan")
    const KabupatenDropDown = document.getElementById("Kabupaten/Kota")
    const KelurahanDropDown = document.getElementById("Kelurahan")
    ProvinsiDropDown.addEventListener('change', function(){
        KabupatenDropDown.innerHTML = `<option value=""> Kabupaten/Kota </option>`
        KecamatanDropDown.innerHTML =  `<option value=""> Kecamatan </option>`
        KelurahanDropDown.innerHTML = `<option value=""> Kelurahan </option>`
        let element = this.querySelector(':checked');
        getKabupaten(element.value)
        //console.log(element);
    })
    KabupatenDropDown.addEventListener('change' , function(){
        KecamatanDropDown.innerHTML =  `<option value=""> Kecamatan </option>`
        KelurahanDropDown.innerHTML =  `<option value=""> Kelurahan </option>`
        let element = this.querySelector(':checked');
        getKecamatan(element.value);
    })
    KecamatanDropDown.addEventListener('change' , function(){
        KelurahanDropDown.innerHTML =  `<option value=""> Kelurahan </option>`
        let element = this.querySelector(':checked');
        getKelurahan(element.value);
    })
})
    function getProvinsi(){
    const ProvinsiDropDown = document.getElementById ("Provinsi")
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    // datanya udah dapet lalu dijadikan json biar datanya bisa dilihat
    .then(response => response.json()) // ngubah respon ke json
    .then(response => { // coba looping
        let provinsi='';
        // pengunaan ' dan ` itu sangat beda jauh, perlu diperhatikan
        response.forEach(P => provinsi += `<option value="${P.id}">${P.name}</option>`);
        ProvinsiDropDown.innerHTML += provinsi
        });
    }

    function getKabupaten(id){
        const KabupatenDropDown = document.getElementById("Kabupaten/Kota")
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`)
        .then(response => response.json()) // ngubah respon ke json
        .then(response => { // coba looping
        let kabupaten='';
        // pengunaan ' dan ` itu sangat beda jauh, perlu diperhatikan
        response.forEach(K => kabupaten += `<option value="${K.id}">${K.name}</option>`);
        KabupatenDropDown.innerHTML = kabupaten
        
        });
    }

    function getKecamatan(id){
        const KecamatanDropDown = document.getElementById("Kecamatan")
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`)
        .then(response => response.json()) // ngubah respon ke json
        .then(response => { // coba looping
        let kecamatan='';
        // pengunaan ' dan ` itu sangat beda jauh, perlu diperhatikan
        response.forEach(Kc => kecamatan += `<option value="${Kc.id}">${Kc.name}</option>`);
        KecamatanDropDown.innerHTML += kecamatan
        })
    }

    function getKelurahan(id){
        const KelurahanDropDown = document.getElementById("Kelurahan")
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`)
        .then(response => response.json())
        .then(response => {
            let Kelurahan='';
            response.forEach(Kl => Kelurahan += `<option value="${Kl.id}">${Kl.name}</option>`);
            KelurahanDropDown.innerHTML += Kelurahan
        })
    }