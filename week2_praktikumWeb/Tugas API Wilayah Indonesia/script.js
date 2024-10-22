async function getWilayah(url) {
  const response = await fetch(url);
  const data = await response.json();
  return data;
}

window.onload = async () => {
  const provinsiSelect = document.getElementById('provinsi');
  const kabupatenSelect = document.getElementById('kabupaten');
  const kecamatanSelect = document.getElementById('kecamatan');
  const kelurahanSelect = document.getElementById('kelurahan');
  const kirimButton = document.getElementById('kirimButton');

  let selectedAddress = ""; // Untuk menyimpan alamat yang dipilih

  const provinsiData = await getWilayah('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
  provinsiData.forEach((prov) => {
    const option = document.createElement('option');
    option.value = prov.id;
    option.textContent = prov.name;
    provinsiSelect.appendChild(option);
  });

  provinsiSelect.addEventListener('change', async function () {
    const provinsiId = this.value;
    kabupatenSelect.innerHTML = '<option selected>Pilih Kabupaten/Kota</option>';
    kecamatanSelect.innerHTML = '<option selected>Pilih Kecamatan</option>';
    kelurahanSelect.innerHTML = '<option selected>Pilih Kelurahan/Desa</option>';
    kabupatenSelect.disabled = true;
    kecamatanSelect.disabled = true;
    kelurahanSelect.disabled = true;

    if (provinsiId) {
      const kabupatenData = await getWilayah(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`);
      kabupatenData.forEach((kab) => {
        const option = document.createElement('option');
        option.value = kab.id;
        option.textContent = kab.name;
        kabupatenSelect.appendChild(option);
      });
      kabupatenSelect.disabled = false;
    }
  });

  kabupatenSelect.addEventListener('change', async function () {
    const kabupatenId = this.value;
    kecamatanSelect.innerHTML = '<option selected>Pilih Kecamatan</option>';
    kelurahanSelect.innerHTML = '<option selected>Pilih Kelurahan/Desa</option>';
    kecamatanSelect.disabled = true;
    kelurahanSelect.disabled = true;

    if (kabupatenId) {
      const kecamatanData = await getWilayah(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenId}.json`);
      kecamatanData.forEach((kec) => {
        const option = document.createElement('option');
        option.value = kec.id;
        option.textContent = kec.name;
        kecamatanSelect.appendChild(option);
      });
      kecamatanSelect.disabled = false;
    }
  });

  kecamatanSelect.addEventListener('change', async function () {
    const kecamatanId = this.value;
    kelurahanSelect.innerHTML = '<option selected>Pilih Kelurahan/Desa</option>';
    kelurahanSelect.disabled = true;

    if (kecamatanId) {
      const kelurahanData = await getWilayah(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`);
      kelurahanData.forEach((kel) => {
        const option = document.createElement('option');
        option.value = kel.id;
        option.textContent = kel.name;
        kelurahanSelect.appendChild(option);
      });
      kelurahanSelect.disabled = false;
    }
  });

  kirimButton.addEventListener('click', () => {
    const provinsi = provinsiSelect.options[provinsiSelect.selectedIndex].text;
    const kabupaten = kabupatenSelect.options[kabupatenSelect.selectedIndex].text;
    const kecamatan = kecamatanSelect.options[kecamatanSelect.selectedIndex].text;
    const kelurahan = kelurahanSelect.options[kelurahanSelect.selectedIndex].text;

    selectedAddress = `${kelurahan}, ${kecamatan}, ${kabupaten}, ${provinsi}`;
    const mapsUrl = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(selectedAddress)}`;
    window.open(mapsUrl, '_blank');
  });
};
