import Sidebar from '@/components/layout/student/Sidebar'
import React from 'react'

const Announcement = () => {
  return (
    <div className='flex'>
      <div className='hidden lg:block w-[18%] '>
            <Sidebar  />
        </div>
        <div className='flex-grow p-6'>
            <h1 className='text-3xl font-bold'>Announcement!</h1>
        </div>
    </div>
  )
}

export default Announcement