import { LOCATION } from '@/constants/constant'
import React from 'react'

const Location = () => {
  return (
    <div className='px-4 lg:px-48 mt-20'>
        <div className='flex flex-col justify-center items-center gap-10'>
          <h1 className='font-bold text-3xl'>Location & Information</h1>
            <div className='flex justify-center items-center gap-5'> 
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.574636381109!2d111.44138667342298!3d-7.401464392608539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79e7c5af82f985%3A0xeae5d5aad2ab3174!2sSMK%20Negeri%201%20Ngawi!5e0!3m2!1sen!2sid!4v1734431972242!5m2!1sen!2sid" width="600" height="450" style={{border:0}}  loading="lazy" referrerPolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <ul className='flex flex-col gap-5'>
                  <h1 className='text-2xl font-bold'>Information</h1>
                  {LOCATION.map((index, i) => (
                    <li key={i} className='flex flex-col gap-5'>
                        <p>{index.location}</p>
                        <p>{index.telp}</p>
                        <p>{index.email}</p>
                        <p>{index.support}</p>
                    </li>
                  ))} 
                </ul>
            </div>
        </div>
    </div>
  )
}

export default Location