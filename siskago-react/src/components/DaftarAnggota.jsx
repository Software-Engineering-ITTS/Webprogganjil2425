import { useNavigate } from "react-router-dom"

function DaftarAnggota() {
    const navigate = useNavigate()
    return (
        <>
            <div className="container">
                <h1 className="text-center mt-4 mb-4">Daftar Anggota</h1>
                <table className="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Gender</th>
                        </tr>
                    </thead>

                    <tbody className="table-group-divider">
                        <tr>

                        </tr>
                    </tbody>
                </table>

                <div className="mt-4 d-flex justify-content-center">
                    <button onClick={() => navigate('/')} className="btn btn-primary">Home</button>
                </div>
            </div>
        </>
    )
}

export default DaftarAnggota