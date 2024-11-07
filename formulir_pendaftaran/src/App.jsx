import { useState } from 'react'
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min";

function App() {

  return (
    <div>
      <div className="" >
        <div className="text-center fw-bold">
            <h1>Pendaftaran Siswa Baru SMK Aduhai</h1>
        </div>

        <form className="form mt-5 bg-body-tertiary p-5" onSubmit={onSubmit}>
            <div>
                <div className="d-flex gap-5 flex-column">
                    <div className="d-flex gap-4 align-items-center ">
                        <p className="">Nama Lengkap :</p> 
                        <input type="text" />
                    </div>

                    

                    

                    <div className="d-flex gap-4">
                        <p>Agama & Kepercayaan : </p>
                        <div className="dropdown">
                            <button className="btn dropdown-toggle btn-close-white" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                                -
                            </button>

                            <ul className="dropdown-menu" >
                                <li className="dropdown-item"><a href="#" className="text-decoration-none text-black">Islam</a></li>
                                <li className="dropdown-item"><a href="#" className="text-decoration-none text-black">Kristen</a></li>
                                <li className="dropdown-item"><a href="#" className="text-decoration-none text-black">Hindu</a></li>
                                <li className="dropdown-item"><a href="#" className="text-decoration-none text-black">Buddha</a></li>
                                <li className="dropdown-item"><a href="#" className="text-decoration-none text-black">Konghucu</a></li>
                            </ul>
                        </div>
                    </div>

                  

                    <div className="d-flex gap-4">
                        <p>Tempat Tinggal : </p>
                        <div>
                            <div className="form-check">
                                <input className="form-check-input" type="checkbox" />
                                <label  htmlFor="">
                                    Bersama Ortu
                                </label>
                            </div>

                            <div className="form-check">
                                <input className="form-check-input" type="checkbox" />
                                <label  htmlFor="">
                                    Wali
                                </label>
                            </div>

                            <div className="form-check">
                                <input className="form-check-input" type="checkbox" />
                                <label  htmlFor="">
                                    Kos
                                </label>
                            </div>

                            <div className="form-check">
                                <input className="form-check-input" type="checkbox" />
                                <label  htmlFor="">
                                    Asrama
                                </label>
                            </div>

                            <div className="form-check">
                                <input className="form-check-input" type="checkbox" />
                                <label  htmlFor="">
                                   Panti Asuhan
                                </label>
                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
        </form>
      </div>
    </div>
  )
}

export default App
