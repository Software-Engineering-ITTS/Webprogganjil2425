import axios from 'axios'
import React, { useState } from 'react'
import { useNavigate } from 'react-router-dom'

const AddCategory = () => {
    const [category, setCategory] = useState()
    const navigate = useNavigate()

    const handleSubmit = (e) => {
        e.preventDefault()
        axios.post('http://localhost:3000/auth/add_category', {category})
        .then(result => {
            if(result.data.Status) {
                navigate('/dashboard/category')
            } else {
                alert(result.data.Error)
            }
        })
        .catch(err => console.log(err))
    }
  return (
    <div className='d-flex justify-content-center align-items-center h-75'>
        <div className='p-3 rounded w-25 border'>
            <h2>Tambah Proyek</h2>
            <form onSubmit={handleSubmit}>
                <div className='mb-3'>
                    <label htmlFor="category"><strong>nama Proyek:</strong></label>
                    <input type="text" name='category' placeholder='Enter Proyek'
                     onChange={(e) => setCategory(e.target.value)} className='form-control rounded-0'/>
                </div>
                <button className='btn btn-success w-100 rounded-5 mb-100'>Submit</button>
            </form>
        </div>
    </div>
  )
}

export default AddCategory