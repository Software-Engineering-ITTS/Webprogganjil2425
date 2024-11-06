import React from 'react'
import { useState } from 'react'

export default function FieldInput() {

const [FieldName, setFieldName] = useState({name:''})
const [error, setError] = useState({})

const handleChange = (e) => {
    const {name, value} = e.target
    setFieldName({
      ...FieldName,
      [name]:value
    })

    // console.log(e.target.value)
  }


const validatorInput = (FieldName) => {
    const error = {}
    if (!FieldName.name.trim()){
        error.name = "*Jangan Kosong!"
    }
    return error

}

const onSubmit = (e) => {
    e.preventDefault()
    const error = validatorInput(FieldName)
    setError(error)
    console.log(error)
}
    
  return (
    <div>
        <form className="d-flex gap-5 flex-column" onSubmit={onSubmit}>
            <div className="d-flex gap-4 align-items-center ">
                <p className="">Nama Lengkap :</p> 
                <input type="text" name='name' id='name' onChange={handleChange}/>
                <input type="submit" />
                <span className='text-danger '>{error.name}</span>
            </div>
        </form>
    </div>
  )
}
