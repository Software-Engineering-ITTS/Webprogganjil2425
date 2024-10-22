const provinsiSelect = document.querySelector("#provinsi");
const kabupatenSelect = document.querySelector("#kabupaten");
const kecamatanSelect = document.querySelector("#kecamatan");
const kelurahanSelect = document.querySelector("#kelurahan");

async function fetchProvinces() {
  const response = await fetch(
    "https://ibnux.github.io/data-indonesia/provinsi.json"
  );
  const provinces = await response.json();
  provinces.forEach((provinsi) => {
    const option = document.createElement("option");
    option.value = provinsi.id;
    option.textContent = provinsi.nama;
    provinsiSelect.appendChild(option);
  });
}

provinsiSelect.addEventListener("change", async function () {
  const provinceId = this.value;

  const response = await fetch(
    `https://ibnux.github.io/data-indonesia/kabupaten/${provinceId}.json`
  );
  const kabupatens = await response.json();
  kabupatens.forEach((kabupaten) => {
    const option = document.createElement("option");
    option.value = kabupaten.id;
    option.textContent = kabupaten.nama;
    kabupatenSelect.appendChild(option);
  });
});

kabupatenSelect.addEventListener("change", async function () {
  const kabupatenId = this.value;

  const response = await fetch(
    `https://ibnux.github.io/data-indonesia/kecamatan/${kabupatenId}.json`
  );
  const kecamatans = await response.json();
  kecamatans.forEach((kecamatan) => {
    const option = document.createElement("option");
    option.value = kecamatan.id;
    option.textContent = kecamatan.nama;
    kecamatanSelect.appendChild(option);
  });
});

kecamatanSelect.addEventListener("change", async function () {
  const kecamatanId = this.value;

  const response = await fetch(
    `https://ibnux.github.io/data-indonesia/kelurahan/${kecamatanId}.json`
  );
  const kelurahans = await response.json();
  kelurahans.forEach((kelurahan) => {
    const option = document.createElement("option");
    option.value = kelurahan.id;
    option.textContent = kelurahan.nama;
    kelurahanSelect.appendChild(option);
  });
});

// Initialize provinces on page load
fetchProvinces();
