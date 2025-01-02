import React, { useState, useEffect } from 'react';

function App() {
  // State untuk menyimpan laporan kejadian
  const [reports, setReports] = useState([]);
  // State untuk menyimpan area yang dipilih (untuk filter laporan)
  const [selectedArea, setSelectedArea] = useState('');

  // State untuk menyimpan opsi kota, kecamatan, dan kelurahan
  const [kotaOptions, setKotaOptions] = useState([]);
  const [kecamatanOptions, setKecamatanOptions] = useState([]);
  const [kelurahanOptions, setKelurahanOptions] = useState([]);

  // State untuk menyimpan nilai kota, kecamatan, dan kelurahan yang dipilih
  const [selectedKota, setSelectedKota] = useState('');
  const [selectedKecamatan, setSelectedKecamatan] = useState('');
  const [selectedKelurahan, setSelectedKelurahan] = useState('');

  // State untuk menyimpan data laporan yang diinputkan oleh user
  const [reportData, setReportData] = useState({
    name: '',
    gender: '',
    crimeType: '',
    description: '',
    area: '',
    address: '',
    time: '',
  });

  // Daftar aksi yang dianggap berbahaya
  const dangerousActions = ['balapan', 'tawuran', 'combat sport'];

  // useEffect untuk memuat data awal kota di Jawa Timur saat aplikasi dimuat
  useEffect(() => {
    fetchKotaJatim();
  }, []);

  /**
   * Fetch data kota di Jawa Timur dari API wilayah Indonesia.
   * Data ini digunakan untuk mengisi dropdown opsi kota.
   */
  const fetchKotaJatim = () => {
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json`)
      .then((response) => response.json())
      .then((data) => {
        setKotaOptions(data);
      });
  };

  /**
   * Fetch data kecamatan berdasarkan ID kota yang dipilih.
   * @param {string} kotaId - ID kota yang dipilih oleh user.
   */
  const fetchKecamatan = (kotaId) => {
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kotaId}.json`)
      .then((response) => response.json())
      .then((data) => {
        setKecamatanOptions(data);
      });
  };

  /**
   * Fetch data kelurahan berdasarkan ID kecamatan yang dipilih.
   * @param {string} kecamatanId - ID kecamatan yang dipilih oleh user.
   */
  const fetchKelurahan = (kecamatanId) => {
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`)
      .then((response) => response.json())
      .then((data) => {
        setKelurahanOptions(data);
      });
  };

  /**
   * Menghandle perubahan nilai pada form input.
   * @param {Object} e - Event dari input form.
   */
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setReportData({ ...reportData, [name]: value });
  };

  /**
   * Menghandle pengiriman form laporan.
   * Menambahkan laporan baru ke dalam daftar laporan.
   * @param {Object} e - Event dari form submit.
   */
  const handleSubmit = (e) => {
    e.preventDefault();
    const timeReported = new Date().toLocaleTimeString(); // Mendapatkan waktu saat laporan dibuat
    const isDangerous = dangerousActions.includes(reportData.crimeType.toLowerCase()); // Mengecek apakah jenis kejahatan berbahaya
    const newReport = {
      ...reportData,
      time: timeReported,
      isDangerous,
    };
    setReports([...reports, newReport]); // Menambahkan laporan baru ke daftar laporan

    // Reset data form setelah submit
    setReportData({
      name: '',
      gender: '',
      crimeType: '',
      description: '',
      area: '',
      address: '',
      time: '',
    });
  };

  /**
   * Menghandle perubahan nilai dropdown kota.
   * Memuat data kecamatan baru berdasarkan kota yang dipilih.
   * @param {Object} event - Event dari dropdown kota.
   */
  const handleKotaChange = (event) => {
    setSelectedKota(event.target.value);
    setSelectedKecamatan('');
    setKecamatanOptions([]);
    if (event.target.value) {
      fetchKecamatan(event.target.value);
    }
  };

  /**
   * Menghandle perubahan nilai dropdown kecamatan.
   * Memuat data kelurahan baru berdasarkan kecamatan yang dipilih.
   * @param {Object} event - Event dari dropdown kecamatan.
   */
  const handleKecamatanChange = (event) => {
    setSelectedKecamatan(event.target.value);
    setSelectedKelurahan('');
    if (event.target.value) {
      fetchKelurahan(event.target.value);
    } else {
      setKelurahanOptions([]);
    }
  };

  /**
   * Menghandle perubahan nilai dropdown kelurahan.
   * @param {Object} event - Event dari dropdown kelurahan.
   */
  const handleKelurahanChange = (event) => {
    setSelectedKelurahan(event.target.value);
  };

  /**
   * Menghandle perubahan area yang dipilih untuk filter laporan.
   * @param {Object} e - Event dari input filter area.
   */
  const handleAreaChange = (e) => {
    setSelectedArea(e.target.value);
  };

  /**
   * Filter laporan berdasarkan area yang dipilih.
   */
  const filteredReports = reports.filter((report) => report.area === selectedArea);

  return (
    <div className="container mt-4">
      <h2>Laporkan Kejadian Terkini</h2>
      <form onSubmit={handleSubmit}>
        <div className="mb-3">
          <label>Nama</label>
          <input
            type="text"
            className="form-control"
            name="name"
            value={reportData.name}
            onChange={handleInputChange}
          />
        </div>
        <div className="mb-3">
          <label>Jenis Kelamin</label><br />
          <input
            type="radio"
            name="gender"
            value="Laki-laki"
            onChange={handleInputChange}
            checked={reportData.gender === 'Laki-laki'}
          /> Laki-laki
          <input
            type="radio"
            name="gender"
            value="Perempuan"
            onChange={handleInputChange}
            checked={reportData.gender === 'Perempuan'}
          /> Perempuan
        </div>
        <div className="mb-3">
          <label>Jenis Kejahatan</label>
          <input
            type="text"
            className="form-control"
            name="crimeType"
            value={reportData.crimeType}
            onChange={handleInputChange}
            placeholder="Masukkan jenis kejahatan"
          />
        </div>
        <div className="mb-3">
          <label>Deskripsi Kejadian</label>
          <textarea
            className="form-control"
            name="description"
            value={reportData.description}
            onChange={handleInputChange}
          ></textarea>
        </div>
        <button type="submit" className="btn btn-primary">Kirim</button>
      </form>

      <div className="mt-5">
        <table className="table mt-3">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Jenis Kejahatan</th>
              <th>Deskripsi</th>
              <th>Jam</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            {filteredReports.map((report, index) => (
              <tr key={index}>
                <td>{report.name}</td>
                <td>{report.gender}</td>
                <td>{report.crimeType}</td>
                <td>{report.description}</td>
                <td>{report.time}</td>
                <td>{report.isDangerous ? 'Berbahaya' : 'Tidak Berbahaya'}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}

export default App;
