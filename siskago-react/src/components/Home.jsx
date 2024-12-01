import { useNavigate } from "react-router-dom"


function Home() {
    const navigate = useNavigate()

    return (
        <>
            <div className="container">
                <div className="d-flex justify-content-center align-items-center" style={{ height: '100vh' }}>
                    <div>
                        <div className="mb-3 text-center">
                            <h1>Sistem Keanggotaan</h1>
                        </div>
                        <div className="d-flex justify-content-center">
                            <div className="mx-2">
                                <button onClick={() => navigate('/FormAnggota')} className="btn btn-outline-primary">Form Pendaftaran</button>
                            </div>
                            <div className="mx-2">
                                <button onClick={() => navigate('/DaftarAnggota')} className="btn btn-outline-primary">Daftar Anggota</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Home