document.addEventListener("DOMContentLoaded", function () {
    const provinsiView = document.getElementById("asal");
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
});

// function getProvinsi(){
//     const provinsiView = document.getElementById("provinsi");
//   fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
//     .then((response) => response.json())
//     .then((response) => {
//       response.forEach((p) => {
//         console.log(p);
//         let prov = "";
//         response.forEach(
//           (p) => (prov += `<option value="${p.id}">${p.name}</option>`)
//         );
//         provinsiView.innerHTML += prov;
//       });
//     });
// }