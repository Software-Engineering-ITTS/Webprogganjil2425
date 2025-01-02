import SidebarStudent from '@/components/layout/student/Sidebar'
import Sidebar from '@/components/layout/student/Sidebar'
import React from 'react'
import { useParams } from 'react-router-dom'


const DashboardStudent = ({}) => {
  const {id} = useParams()
  
  return (
    <div className='flex'>
        <div className='hidden lg:block w-[18%] '>
            <SidebarStudent  />
        </div>
        <div className='flex-grow p-6'>
            <h1 className='text-2xl font-bold'>Welcome to SMK Ngawi {id} !</h1>
        </div> 
    </div>
  )
}

export default DashboardStudent