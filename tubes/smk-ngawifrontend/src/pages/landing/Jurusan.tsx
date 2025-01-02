import React from 'react'
import { JURUSANLIST } from '../../constants/constant'

const Jurusan = () => {
  return (
    <div className='px-4 lg:px-48 mt-20'>
        <div className='flex flex-col justify-center items-center gap-10'>
            <div>
                <h1 className='text-4xl font-bold'>Jurusan</h1>
            </div>
            <div className='grid grid-cols-2 gap-10'>
                {JURUSANLIST.map((index, i) => (
                    <div key={i} className='bg-yellow-400 p-3 rounded-xl'>
                        <div className='flex items-center gap-5'>
                            <h1 className='text-3xl'>
                                {index.icon}
                            </h1>
                            <div className='flex flex-col gap-2'>
                                <h1 className='text-xl font-bold'>{index.title}</h1>
                                <p className='text-sm'>{index.description}</p>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    </div>
  )
}

export default Jurusan