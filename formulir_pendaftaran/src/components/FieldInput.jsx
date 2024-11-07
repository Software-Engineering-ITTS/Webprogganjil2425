import React, { useEffect } from 'react'
import { useState } from 'react'
import { CHECKBOXITEM, DROPDOWNITEM } from '../constant/itemConstants'



export default function FieldInput() {

const [FieldName, setFieldName] = useState(
  {name: '', number: '', gender: '', 
    sekolah: '', nik: '', kk: '', tanggalLahir:'', tempatLahir:'', dropdown:'',alamat:'', rt:'', rw:'',
    dusun:'', kelurahan:'', tempatTinggal:'', kodePos:''
  }
)

useEffect(() => {
  const check = document.querySelector('.test-checkbox')
  console.log(check)
}, [])


const updateValue = (e) => {
  const { value } = e.target
  setFieldName({
    ...FieldName,
    dropdown:value
  })
}

const [error, setError] = useState({})

const handleChange = (e) => {
    const {name, value} = e.target
    setFieldName({
      ...FieldName,
      [name]:value
    })

  }


const validatorInput = (FieldName) => {
    const error = {}
    if (!FieldName.name.trim()){
        error.name = "*Jangan Kosong!"
    }

    if (!FieldName.nik.trim()){
      error.nik = "*Isi NIK!"
    }

    if (!FieldName.sekolah.trim()){
      error.sekolah = "*Isi sekolah!"
    }
    
    if (!FieldName.gender) {
      error.gender = "*Pilih Jenis Kelamin!";
    }
    
    if (!FieldName.tanggalLahir) {
      error.tanggalLahir = "*Pilih Tanggal Lahir!";
    }

    if (!FieldName.kk.trim()){
      error.kk = "*Isi KK!"
    }

    if (!FieldName.tempatLahir.trim()){
      error.tempatLahir = "*Isi tempat lahir!"
    }

    if (!FieldName.dropdown){
      error.dropdown = "*Pilih salah satu!"
    }

    if (!FieldName.alamat){
      error.alamat = "*Isi alamat!"
    }

    if (!FieldName.rt){
      error.rt = "*Isi nomor RT!"
    }

    if (!FieldName.rw){
      error.rw = "*Isi nomor RW!"
    }

    if (!FieldName.dusun){
      error.dusun = "*Isi nama dusun!"
    }

    if (!FieldName.kelurahan){
      error.kelurahan = "*Isi nama kelurahan / desa!"
    }

    if (!FieldName.tempatTinggal){
      error.tempatTinggal = "*Pilih salah satu!"
    }

    if (!FieldName.kodePos){
      error.kodePos = "*Pilih isi kode pos!"
    }


    
    return error

}

const onSubmit = (e) => {
    e.preventDefault()
    const error = validatorInput(FieldName)
    setError(error)
    console.log(error)
    if(Object.keys(error).length === 0){
      console.log('Form sukses disubmit : ' , FieldName)
    }
}
    
  return (
    <div>
        <form className="d-flex gap-5 flex-column" onSubmit={onSubmit}>
            <div className="d-flex gap-4 align-items-center ">
                <p className="">Nama Lengkap :</p> 
                <input type="text" name='name' id='name' onChange={handleChange}/>
                <span className='text-danger '>{error.name}</span>
            </div>

              <div className="d-flex gap-4">
                  <p>Jenis Kelamin : </p>
                  <div>
                      <div className="form-check">
                          <input className="form-check-input" type="radio" name="gender" value={"Laki - Laki"} checked={FieldName.gender === "Laki - Laki"} id="radioAduh" onChange={handleChange} />
                          <label className="form-check-label"  htmlFor="radioLakiLaki" >
                              Laki Laki
                          </label>
                      </div>
                      <div className="form-check">
                          <input className="form-check-input" name="gender" value={"Perempuan"} type="radio" checked={FieldName.gender === "Perempuan"} onChange={handleChange}/>
                          <label  className="form-check-label"  htmlFor="radioPerempuan">
                              Perempuan
                          </label>
                      </div>
                  </div>
                <span className='text-danger '>{error.gender}</span>
              </div>
              
            <div className="d-flex gap-4">
                <p>Asal Sekolah : </p>
                <input type="text" name='sekolah'onChange={handleChange}/>
                <span className='text-danger '>{error.sekolah}</span>
            </div>
  
            <div className="d-flex gap-4">
                <p>NIK : </p>
                <input type="number" name='nik' onChange={handleChange}/>
                <span className='text-danger '>{error.nik}</span>

            </div>
            <div className="d-flex gap-4">
                <p>No.Kartu Keluarga/KK : </p>
                <input type="number" name='kk' onChange={handleChange}/>
                <span className='text-danger '>{error.kk}</span>
            </div>

            <div className="d-flex gap-4">
                <p>Tanggal Lahir : </p>
                <input type="datetime-local" name='tanggalLahir' onChange={handleChange}/>
                <span className='text-danger '>{error.tanggalLahir}</span>
            </div>

            <div className="d-flex gap-4">
                <p>Tempat Lahir : </p>
                <input type="text" name='tempatLahir' id=""onChange={handleChange} />
                <span className='text-danger '>{error.tempatLahir}</span>
            </div>

            <div className="d-flex gap-4">
                <p>Agama & Kepercayaan : </p>
                <div className="dropdown">
                    <select name="dropdown" value={FieldName.dropdown} onChange={updateValue}>
                      <option value="">-</option>
                      {DROPDOWNITEM.map((item, i) => {
                        return <option key={i} value={item.value} className='test'>{item.value}</option>
                      })}
                    </select>
                <span className='text-danger '>{error.dropdown}</span>
              </div>

            </div>
                <div className="d-flex gap-4">
                    <p>Alamat Jalan : </p>
                    <textarea name='alamat' onChange={handleChange}></textarea>
                    <span className='text-danger '>{error.alamat}</span>
                </div>

                <div className="d-flex gap-4">
                    <p>RT : </p>
                    <input type="number" name='rt' onChange={handleChange}/>
                    <span className='text-danger '>{error.rt}</span>
                </div>

                <div className="d-flex gap-4">
                    <p>RW : </p>
                    <input type="number" name='rw' onChange={handleChange}/>
                    <span className='text-danger '>{error.rw}</span>
                </div>

                <div className="d-flex gap-4">
                    <p>Nama Dusun :</p>
                    <input type="text" name='dusun' onChange={handleChange}/>
                    <span className='text-danger '>{error.dusun}</span>
                </div>

                <div className="d-flex gap-4">
                    <p>Nama Kelurahan / Desa :</p>
                    <input type="text" name='kelurahan' onChange={handleChange}/>
                    <span className='text-danger '>{error.kelurahan}</span>
                </div>

                <div className="d-flex gap-4">
                   <p>Tempat Tinggal : </p>
                   <div>
                     <div  className="form-check">
                      {CHECKBOXITEM.map((item, i) => {
                          return <div key={i} className='test-checkbox'>
                            <input className="form-check-input" type="checkbox" name='tempatTinggal'  onChange={handleChange}/>
                             <label  htmlFor="">
                                 {item.value}
                             </label>
                           </div>
                      })}
                      </div>
                   </div>
                   <span className='text-danger '>{error.tempatTinggal}</span>
                </div>

               <div className="d-flex gap-4">
                    <p>Kode Pos :</p>
                    <input type="number" name='kodePos' onChange={handleChange}/>
                   <span className='text-danger '>{error.kodePos}</span>
                </div>

            <div>
                <input type="submit" />
            </div>
        </form>
    </div>
  )
}
