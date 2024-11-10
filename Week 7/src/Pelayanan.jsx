import { useState, useEffect } from 'react';
import './Pelayanan.css';
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
//import './App.css'

function Pelayanan() {
    const [nama, setNama] = useState('');
    const [alamat, setAlamat] = useState('');
    const [ttl, setTtl] = useState('');
    const [gender, setGender] = useState('');
    const [umur, setUmur] = useState('');
    const [keluhan, setKeluhan] = useState('');
    const [kondisi, setKondisi] = useState([]);
    const [konsultasi, setKonsultasi] = useState(false);
    const [antrian, setAntrian] = useState([]);

    const aturKondisi = (event) => {
        const { value, checked } = event.target;
        setKondisi((prevKondisi) =>
            checked ? [...prevKondisi, value] : prevKondisi.filter((item) => item !== value)
        );
    };

    const aturAntrian = (event) => {
        const { id, checked } = event.target;
        if (checked) {
            setAntrian([id]);
        } else {
            setAntrian([]);
        }
    };

    const aturKonsultasi = () => {
        document.querySelectorAll('.btn-check').forEach((checkbox) => {
            checkbox.disabled = !konsultasi;
            if (!konsultasi) checkbox.checked = false;
        });
    };

    useEffect(() => {
        aturKonsultasi();
    }, [konsultasi]);

    const aturSubmit = () => {
        window.location.href = "Submit.html";
    };

    return (
        <div className="container my-5">
            <div className="row justify-content-center">
                <div className="custom-card">
                    <img src="ft.doctor-team.png" alt="tim-dokter" className="icon-kiri" />
                    <h1 className="welcome">Welcome To PekkaMed</h1>
                    <img src="ft-medical.png" alt="medis" className="icon-kanan" />
                    <img src="ft-stt.png" className="img-st" />
                    <h2 className="title-2">Formulir Pendataan Konsultasi Online</h2>
                    <br />
                    <br />
                    <br />
                    <br />

                    {/* text */}
                    <label className="nm">Nama Lengkap</label>
                    <input
                        type="text"
                        className="nama"
                        value={nama}
                        onChange={(e) => setNama(e.target.value)}
                    />
                    <br />

                    {/* text area */}
                    <label className="almt">Alamat / Domisili</label>
                    <textarea
                        id="almt"
                        rows="3"
                        className="txt-almt"
                        value={alamat}
                        onChange={(e) => setAlamat(e.target.value)}
                    ></textarea>
                    <br />
                    <br />

                    {/* text area */}
                    <label className="t-ttl">Tempat Kelahiran</label>
                    <textarea
                        id="ttl"
                        rows="2"
                        className="ttl"
                        value={ttl}
                        onChange={(e) => setTtl(e.target.value)}
                    ></textarea>
                    <br />
                    <br />
                    <br />

                    {/* radio */}
                    <label className="t-gender">Gender</label>
                    <input
                        type="radio"
                        name="gender"
                        className="gender-l"
                        checked={gender === 'laki-laki'}
                        onChange={() => setGender('laki-laki')}
                    /> Laki Laki

                    <input
                        type="radio"
                        name="gender"
                        className="gender-p"
                        checked={gender === 'perempuan'}
                        onChange={() => setGender('perempuan')}
                    /> Perempuan
                    <br />
                    <br />

                    {/* dropdown select */}
                    <label className="t-umur">Rentang Usia</label>
                    <select
                        className="umur"
                        value={umur}
                        onChange={(e) => setUmur(e.target.value)}>
                        <option value="1-5">1-5 Tahun</option>
                        <option value="6-10">6-10 Tahun</option>
                        <option value="11-15">11-15 Tahun</option>
                        <option value="16-20">16-20 Tahun</option>
                        <option value="21-25">21-25 Tahun</option>
                        <option value="26-30">26-30 Tahun</option>
                        <option value="31-35">31-35 Tahun</option>
                        <option value="36-40">36-40 Tahun</option>
                        <option value="41-45">41-45 Tahun</option>
                        <option value="46-50">46-50 Tahun</option>
                        <option value="51-55">51-55 Tahun</option>
                        <option value="56-60">56-60 Tahun</option>
                        <option value="60++">60++ Tahun</option>
                    </select>
                    <br />
                    <br />

                    {/* text area */}
                    <label className="t-keluhan">Keluhan</label>
                    <textarea
                        id="keluhan"
                        rows="6"
                        className="keluhan"
                        value={keluhan}
                        onChange={(e) => setKeluhan(e.target.value)}
                    ></textarea>
                    <br />
                    <br />

                    {/* chechbox */}
                    <label className="t-sikon">Kondisi Saat Ini</label>
                    <br />
                    <div className="situasi" role="group" aria-label="Basic checkbox toggle button group">
                        <input
                            type="checkbox"
                            className="check"
                            id="btncheck1"
                            autoComplete="off"
                            name="kondisi"
                            value="Rentang Normal"
                            onChange={aturKondisi}
                        />
                        <label className="btn btn-outline-primary" htmlFor="btncheck1">Rentang Normal</label>
                        <br />

                        <input
                            type="checkbox"
                            className="check"
                            id="btncheck2"
                            autoComplete="off"
                            name="kondisi"
                            value="Merasakan Sakit"
                            onChange={aturKondisi}
                        />
                        <label className="btn btn-outline-primary" htmlFor="btncheck2">Merasakan Sakit</label> <br />

                        <input
                            type="checkbox"
                            className="check"
                            id="btncheck3"
                            autoComplete="off"
                            name="kondisi"
                            value="Sakit Berlebihan"
                            onChange={aturKondisi}
                        />
                        <label className="btn btn-outline-primary" htmlFor="btncheck3">Sakit Berlebihan</label>
                    </div>
                    <br />

                    {/* radio */}
                    <label className="t-konsul">Butuh Konsultasi Secara Langsung?</label>
                    <br />
                    <input
                        type="radio"
                        name="pilih"
                        id="ya"
                        className="pilihan-konsul"
                        checked={konsultasi === true}
                        onChange={() => setKonsultasi(true)}
                    /> Ya
                    <input
                        type="radio"
                        name="pilih"
                        id="tidak"
                        className="pilihan-konsul"
                        checked={konsultasi === false}
                        onChange={() => setKonsultasi(false)}
                    /> Tidak
                    <br />
                    <br />

                    {/* button */}
                    <label className="t-antri">Ambil Antrean</label>
                    <br />
                    <div className="antrian" role="group" aria-label="Basic checkbox toggle button group">
                        <input
                            type="checkbox"
                            className="btn-check"
                            id="Normal"
                            disabled={!konsultasi}
                            checked={antrian.includes('Normal')}
                            onChange={aturAntrian}
                        />
                        <label className="btn btn-outline-primary" htmlFor="Normal">Normal</label>

                        <input
                            type="checkbox"
                            className="btn-check"
                            id="Slight Emergency"
                            autoComplete="off"
                            disabled={!konsultasi}
                            checked={antrian.includes('Slight Emergency')}
                            onChange={aturAntrian}
                        />
                        <label className="btn btn-outline-primary" htmlFor="Slight Emergency">Slight Emergency</label>

                        <input
                            type="checkbox"
                            className="btn-check"
                            id="Emergency"
                            autoComplete="off"
                            disabled={!konsultasi}
                            checked={antrian.includes('Emergency')}
                            onChange={aturAntrian}
                        />
                        <label className="btn btn-outline-primary" htmlFor="Emergency">Emergency</label>
                    </div>
                    <br />
                    <br />

                    {/* button */}
                    <input
                        className="submit"
                        type="submit"
                        value="Submit"
                        onClick={aturSubmit}
                    />
                    <br />
                </div>
            </div>
        </div>
    );
}

export default Pelayanan;
