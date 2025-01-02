import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { Link } from 'react-router-dom'

const Category = () => {

    const [category, setCategory] = useState([])

    useEffect(() => {
        axios.get('http://localhost:3000/auth/category')
        .then(result => {
            if(result.data.Status) {
                setCategory(result.data.Result); // Menyimpan data kategori ke dalam state
            } else {
                alert(result.data.Error) // Menampilkan alert jika ada error
            }
        }).catch(err => console.log(err))
    }, [])

  return (
    <div className='px-5 mt-3'>
        <div className='d-flex justify-content-center'>
            <h3>List Proyek</h3>
        </div>
        <Link to="/dashboard/add_category" className='btn btn-success'>Tambah Nama Proyek</Link>
        <div className='mt-3'>
            <table className='table'>
                <thead>
                    <tr>
                        <th>Nama Proyek</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        category.map(c => (
                            <tr key={c.id}> {/* Pastikan memberikan key pada setiap elemen yang di-iterate */}
                                <td>{c.nama}</td> {/* Mengakses properti 'nama' dari setiap objek kategori */}
                            </tr>
                        ))
                    }
                </tbody>
            </table>
        </div>
    </div>
  )
}

export default Category
