import React from 'react'
import { ABOUT } from '../../constants/constant'

const About = () => {
  return (
    <div className='px-4 lg:px-48 mt-20'>
        <div className='flex items-center justify-center gap-16'>
            <h1 className='text-3xl font-bold'>Tentang Kami</h1>
            <div className='flex flex-col gap-5 '>
                <div className='flex flex-col gap-5 bg-gray-100 p-7 rounded-xl'> 
                    <h1 className='text-2xl font-bold'>Visi</h1>
                    <p>{ABOUT.visi}</p>
                </div>
                <div className='flex flex-col gap-5 mt-10 bg-gray-100 p-7 rounded-xl'>
                    <h1 className='text-2xl font-bold'>Misi</h1>
                    <ul>
                      {ABOUT.misi.map((misi, i) => (
                        <li key={i} className=''>
                          <p>{misi}</p>
                        </li>
                      ))}
                    </ul>
                </div>
            </div>
        </div>
    </div>
  )
}

export default About