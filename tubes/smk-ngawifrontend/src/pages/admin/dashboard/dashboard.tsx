import SidebarAdmin from '@/components/layout/admin/Sidebar'
import React from 'react'

const DashboardAdmin = () => {
  return (
    <div className='flex'>
      <div className='hidden lg:block w-[18%] '>
            <SidebarAdmin  />
        </div>
        <div className='flex-grow p-6'>
            <h1 className='text-3xl font-bold'>Welcome Admin!</h1>
        </div>
    </div>
  )
}

export default DashboardAdmin