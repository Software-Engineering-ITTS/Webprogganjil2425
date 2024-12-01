import { useNavigate } from "react-router-dom";

function FormulirAnggotaBaru() {
    const navigate = useNavigate()

    return (
        <>
            <div className='container-fluid'>
                <div className='d-flex justify-content-center align-items-center bg-light min-vh-100'>
                    <div className='ps-4 pe-4' style={{ width: '1000px', backgroundColor: '#fff' }}>
                        <div className="mt-3">
                            <button onClick={() => navigate('/')} className="rounded-circle img-thumbnail"><img src="https://cdn3.iconfinder.com/data/icons/glypho-free/64/home-512.png" alt="" style={{ width: '45px' }} /></button>
                        </div>

                        <h1 className='mb-4 text-center fw-bold fs-1'>Sistem Keanggotaan</h1>

                        <div className='row py-2'>
                            <div className='col-12 d-flex justify-content-center'>
                                <img src="https://www.w3schools.com/howto/img_avatar.png" className="rounded-circle" style={{ width: '200px', height: '200px' }} />
                            </div>
                        </div>

                        <div className='mt-3'>
                            <form action="FormulirAnggotaBaru.jsx">
                                <div className='row mb-2'>
                                    <div className='col-md-6'>
                                        <label htmlFor="nama" className='form-label fw-bold fs-4'>Nama Lengkap</label>
                                        <input type="text" className='form-control' id='nama' required />
                                    </div>

                                    <div className='col-md-6'>
                                        <label htmlFor="email" className='form-label fw-bold fs-4'>Email</label>
                                        <input type="email" className='form-control' id='email' placeholder='name@example.com' required />
                                    </div>
                                </div>

                                <div className='row mb-2'>
                                    <div className='col-md-6'>
                                        <label htmlFor="tgl" className='form-label fw-bold fs-4'>Tanggal Lahir</label>
                                        <input type="date" className='form-control' id='tgl' required />
                                    </div>

                                    <div className='col-md-6'>
                                        <label htmlFor="tempat-lahir" className='form-label fw-bold fs-4'>Tempat Lahir</label>
                                        <input type="text" className='form-control' id='tempat-lahir' placeholder='Surabaya' required />
                                    </div>
                                </div>

                                <div className='row mb-2'>
                                    <div className='col-md-6'>
                                        <label htmlFor="agama" className='form-label fw-bold fs-4'>Agama</label>
                                        <input type="text" className='form-control' placeholder='Islam' required />
                                    </div>

                                    <div className='col-md-4'>
                                        <label htmlFor="gender" className='form-label fw-bold fs-4'>Gender</label> <br />
                                        <div className='form-check d-flex align-items-center'>
                                            <input type="radio" name="gender" value="Laki-Laki" className='form-check-input' defaultChecked={true} />
                                            <label className='form-check-label ms-2 mt-1 fs-5'>Laki - Laki</label>
                                            <input type="radio" name="gender" value="perempuan" className='form-check-input ms-4' />
                                            <label className='form-check-label ms-2 mt-1 fs-5'>Perempuan</label>
                                        </div>
                                    </div>
                                </div>

                                <div className='mb-2'>
                                    <label htmlFor="alamat" className='form-label fw-bold fs-4'>Alamat</label>

                                    <div className='row'>
                                        <div className='col-md-6'>
                                            <select className='form-select mb-2 fs-5'>
                                                <option value="">Provinsi</option>
                                            </select>
                                        </div>

                                        <div className='col-md-6'>
                                            <select className='form-select mb-2 fs-5'>
                                                <option value="">Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div className='row'>
                                        <div className='col-md-6'>
                                            <select className='form-select mb-2 fs-5'>
                                                <option value="">Kecamatan</option>
                                            </select>
                                        </div>

                                        <div className='col-md-6'>
                                            <select className='form-select mb-2 fs-5'>
                                                <option value="">Kelurahan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div className='row'>
                                    <div className='col-md-6'>
                                        <label htmlFor="catatan" className='form-label fw-bold fs-4'>Catatan
                                            <textarea name="postContent" className='form-control' id="catatan" rows={3} cols={55}></textarea>
                                        </label>
                                    </div>

                                    <div className='col-12 my-2'>
                                        <div className='form-check'>
                                            <input type="checkbox" className='form-check-input' />
                                            <label htmlFor="persetujuan" className='form-check-label fst-italic'>Saya setuju untuk membayar biaya keanggotaan setiap bulan</label>
                                        </div>

                                        <div className='form-check'>
                                            <input type="checkbox" className='form-check-input' />
                                            <label htmlFor="persetujuan" className='form-check-label fst-italic'>Saya menyetujui kebijakan dan privasi</label>
                                        </div>
                                    </div>
                                </div>

                                <div className='row'>
                                    <div className='mb-3 col-1'>
                                        <a href="" type='submit' className='btn btn-outline-primary'>Submit</a>
                                    </div>

                                    <div className='col-1'>
                                        <button type='reset' className='btn btn-outline-primary'>Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
export default FormulirAnggotaBaru