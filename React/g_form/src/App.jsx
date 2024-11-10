import React, { useState, useEffect } from 'react';

function App() {
  const [reports, setReports] = useState([]);
  const [selectedArea, setSelectedArea] = useState('');

  const [kotaOptions, setKotaOptions] = useState([]);
  const [kecamatanOptions, setKecamatanOptions] = useState([]);
  const [kelurahanOptions, setKelurahanOptions] = useState([]);

  const [selectedKota, setSelectedKota] = useState('');
  const [selectedKecamatan, setSelectedKecamatan] = useState('');
  const [selectedKelurahan, setSelectedKelurahan] = useState('');

  const [reportData, setReportData] = useState({
    name: '',
    gender: '',
    crimeTypes: [],
    description: '',
    area: '',
    address: '',
    time: '',
  });

  // Fetch data kota di Jawa Timur ketika komponen dimuat
  useEffect(() => {
    fetchKotaJatim();
  }, []);

  const fetchKotaJatim = () => {
    // Mengambil data kota di Jawa Timur (Provinsi ID = 35)
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json`) // Provinsi Jawa Timur (ID = 35)
      .then((response) => response.json())
      .then((data) => {
        setKotaOptions(data); // Set kota di Jawa Timur
      });
  };

  const fetchKecamatan = (kotaId) => {
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kotaId}.json`)
      .then((response) => response.json())
      .then((data) => {
        setKecamatanOptions(data); // Set kecamatan berdasarkan kota yang dipilih
      });
  };

  const fetchKelurahan = (kecamatanId) => {
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`)
      .then((response) => response.json())
      .then((data) => {
        setKelurahanOptions(data); // Set kelurahan berdasarkan kecamatan yang dipilih
      });
  };

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setReportData({ ...reportData, [name]: value });
  };

  const handleCrimeTypeChange = (type) => {
    setReportData((prevData) => ({
      ...prevData,
      crimeTypes: prevData.crimeTypes.includes(type)
        ? prevData.crimeTypes.filter((t) => t !== type)
        : [...prevData.crimeTypes, type],
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    const timeReported = new Date().toLocaleTimeString();
    const newReport = { ...reportData, time: timeReported };
    setReports([...reports, newReport]);

    setReportData({
      name: '',
      gender: '',
      crimeTypes: [],
      description: '',
      area: '',
      address: '',
      time: '',
    });
  };

  const handleKotaChange = (event) => {
    setSelectedKota(event.target.value);
    setSelectedKecamatan('');
    setKecamatanOptions([]);
    if (event.target.value) {
      fetchKecamatan(event.target.value);
    }
  };

  const handleKecamatanChange = (event) => {
    setSelectedKecamatan(event.target.value);
    setSelectedKelurahan('');
    if (event.target.value) {
      fetchKelurahan(event.target.value);
    } else {
      setKelurahanOptions([]);
    }
  };

  const handleKelurahanChange = (event) => {
    setSelectedKelurahan(event.target.value);
  };

  const handleAreaChange = (e) => {
    setSelectedArea(e.target.value);
  };

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
          <label>Jenis Kejahatan</label><br />
          <input type="checkbox" onChange={() => handleCrimeTypeChange('Balapan')} /> Balapan
          <input type="checkbox" onChange={() => handleCrimeTypeChange('Tawuran')} /> Tawuran
          <input type="checkbox" onChange={() => handleCrimeTypeChange('Combat Sport')} /> Combat Sport
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

      
        <div className="mb-3">
          <label>Pilih Kota di Jawa Timur</label>
          <select
            className="form-select"
            value={selectedKota}
            onChange={handleKotaChange}
          >
            <option value="">Pilih Kota</option>
            {kotaOptions.map((kota) => (
              <option key={kota.id} value={kota.id}>
                {kota.name}
              </option>
            ))}
          </select>
        </div>

        {/* Dropdown Kecamatan */}
        {selectedKota && (
          <div className="mb-3">
            <label>Pilih Kecamatan</label>
            <select
              className="form-select"
              value={selectedKecamatan}
              onChange={handleKecamatanChange}
            >
              <option value="">Pilih Kecamatan</option>
              {kecamatanOptions.map((kecamatan) => (
                <option key={kecamatan.id} value={kecamatan.id}>
                  {kecamatan.name}
                </option>
              ))}
            </select>
          </div>
        )}

      
        {selectedKecamatan && (
          <div className="mb-3">
            <label>Pilih Kelurahan</label>
            <select
              className="form-select"
              value={selectedKelurahan}
              onChange={handleKelurahanChange}
            >
              <option value="">Pilih Kelurahan</option>
              {kelurahanOptions.map((kelurahan) => (
                <option key={kelurahan.id} value={kelurahan.id}>
                  {kelurahan.name}
                </option>
              ))}
            </select>
          </div>
        )}

        <div className="mb-3">
          <label>Alamat</label>
          <input
            type="text"
            className="form-control"
            name="address"
            value={reportData.address}
            onChange={handleInputChange}
          />
        </div>

        <button type="submit" className="btn btn-primary">Kirim</button>
      </form>


      <div className="mt-5">
        <table className="table mt-3">
          <thead>
            <tr>
              <th>Tipe Kejahatan</th>
              <th>Deskripsi</th>
              <th>Jam</th>
            </tr>
          </thead>
          <tbody>
            {filteredReports.map((report, index) => (
              <tr key={index}>
               
                <td>{report.crimeTypes.join(', ')}</td>
                <td>{report.description}</td>
                <td>{report.time}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}

export default App;
