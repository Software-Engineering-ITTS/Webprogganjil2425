// Mengambil elemen select
const provincesSelect = document.getElementById("provinces");
const regenciesSelect = document.getElementById("regencies");
const districtsSelect = document.getElementById("districts");
const villagesSelect = document.getElementById("villages");
const submitBtn = document.getElementById("submitBtn");
const locationForm = document.getElementById("locationForm");

// Disable dropdown kabupaten, kecamatan, desa saat awal
regenciesSelect.disabled = true;
districtsSelect.disabled = true;
villagesSelect.disabled = true;

// Mengambil data provinsi dari API
fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
  .then((response) => response.json())
  .then((provinces) => {
    // Kosongkan pilihan awal
    provincesSelect.innerHTML =
      "<option selected>Open this select menu</option>";

    // Mengisi dropdown dengan data provinsi
    provinces.forEach((province) => {
      let option = document.createElement("option");
      option.value = province.id;
      option.text = province.name;
      provincesSelect.appendChild(option);
    });
  })
  .catch((error) => {
    console.error("Error fetching provinces:", error);
  });

// Event listener ketika provinsi dipilih
provincesSelect.addEventListener("change", function () {
  const provinceId = this.value;

  // Mengosongkan dropdown kabupaten, kecamatan, desa
  regenciesSelect.innerHTML = "<option selected>Open this select menu</option>";
  districtsSelect.innerHTML = "<option selected>Open this select menu</option>";
  villagesSelect.innerHTML = "<option selected>Open this select menu</option>";

  // Jika provinsi dipilih
  if (provinceId) {
    // Mengambil data kabupaten/kota berdasarkan ID provinsi
    fetch(
      `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`
    )
      .then((response) => response.json())
      .then((regencies) => {
        // Mengisi dropdown dengan data kabupaten
        regencies.forEach((regency) => {
          let option = document.createElement("option");
          option.value = regency.id;
          option.text = regency.name;
          regenciesSelect.appendChild(option);
          regenciesSelect.disabled = false;
        });
      })
      .catch((error) => {
        console.error("Error fetching regencies:", error);
      });
  }
});

// Event listener ketika kabupaten dipilih
regenciesSelect.addEventListener("change", function () {
  const regencyId = this.value;

  // Mengosongkan dropdown kecamatan, desa
  districtsSelect.innerHTML = "<option selected>Open this select menu</option>";
  villagesSelect.innerHTML = "<option selected>Open this select menu</option>";

  // Jika kabupaten dipilih
  if (regencyId) {
    // Mengambil data kecamatan berdasarkan ID kabupaten
    fetch(
      `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regencyId}.json`
    )
      .then((response) => response.json())
      .then((districts) => {
        // Mengisi dropdown dengan data kecamatan
        districts.forEach((district) => {
          let option = document.createElement("option");
          option.value = district.id;
          option.text = district.name;
          districtsSelect.appendChild(option);
          districtsSelect.disabled = false;
        });
      })
      .catch((error) => {
        console.error("Error fetching districts:", error);
      });
  }
});

// Event listener ketika kecamatan dipilih
districtsSelect.addEventListener("change", function () {
  const districtId = this.value;

  // Mengosongkan dropdown desa
  villagesSelect.innerHTML = "<option selected>Open this select menu</option>";

  // Jika kecamatan dipilih
  if (districtId) {
    // Mengambil data desa berdasarkan ID kecamatan
    fetch(
      `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`
    )
      .then((response) => response.json())
      .then((villages) => {
        // Mengisi dropdown dengan data desa
        villages.forEach((village) => {
          let option = document.createElement("option");
          option.value = village.id;
          option.text = village.name;
          villagesSelect.appendChild(option);
          villagesSelect.disabled = false;
        });
      })
      .catch((error) => {
        console.error("Error fetching villages:", error);
      });
  }
});

// Event listener untuk tombol Kirim
locationForm.addEventListener("submit", function () {
  // Mendapatkan nama lokasi dari pilihan dropdown
  const provinceName =
    provincesSelect.options[provincesSelect.selectedIndex].text;
  const regencyName =
    regenciesSelect.options[regenciesSelect.selectedIndex].text;
  const districtName =
    districtsSelect.options[districtsSelect.selectedIndex].text;
  const villageName = villagesSelect.options[villagesSelect.selectedIndex].text;

  // Membuat string lokasi lengkap
  const fullLocation = `${villageName}, ${districtName}, ${regencyName}, ${provinceName}`;

  // Membuka lokasi di Google Maps
  const googleMapsUrl = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(
    fullLocation
  )}`;
  window.open(googleMapsUrl, "_blank");
});
