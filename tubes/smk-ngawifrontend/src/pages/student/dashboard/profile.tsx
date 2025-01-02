import Sidebar from '@/components/layout/student/Sidebar'
import { useUserQuery } from '@/store/slices/auht.service';
import React from 'react'
import { CgProfile } from "react-icons/cg";

const Profile = () => {

    const {data, isLoading, isError} = useUserQuery()
    console.log("User data:", data)
    console.log("Is loading:", isLoading)
    console.log("Error:", isError)

    const user = data?.data

  return (
    <div className='flex'>
      <div className='hidden lg:block w-[18%] '>
            <Sidebar  />
        </div>
        <div className='flex-grow p-32 justify-center items-center '>
            <div className=' items-center gap-16 bg-yellow-100  rounded-xl'>
                <div className='bg-yellow-300 inline-block p-2 px-8 rounded-xl'>
                    <h1 className='text-3xl font-bold text-start '>Profile Pendaftar</h1>
                </div>
                <div className='flex flex-row-reverse justify-center mt-10 gap-16'>
                    <div className='flex flex-col gap-5 items-center justify-center'>
                        <h1 className='text-7xl bg-yellow-300 rounded-full'><CgProfile /></h1>
                        <h2 className='text-3xl font-semibold'>{user?.nama_lengkap || "Unnamed User"}</h2>
                    </div>
                    <div className='bg-yellow-100 p-8'>
                        <ul className='text-xl grid grid-cols-2 gap-12  rounded-xl'>
                            <li className='bg-yellow-200  p-3 rounded-xl'><strong>Email:</strong> {user?.email}</li>
                            <li className='bg-yellow-200  p-3 rounded-xl'><strong>Full Name:</strong> {user?.nama_lengkap}</li>
                            <li className='p-3' ><strong>Phone Number:</strong> {user?.nomor_telepon}</li>
                            <li className='p-3'><strong>Date of Birth:</strong> {user?.tanggal_lahir}</li>
                            <li className='bg-yellow-200  p-3 rounded-xl'><strong>Gender:</strong> {user?.jenis_kelamin}</li>
                            <li className='bg-yellow-200  p-3 rounded-xl'><strong>School:</strong> {user?.asal_sekolah}</li>
                            <li className='p-3'><strong>Address:</strong> {user?.alamat}</li>
                            <li className='p-3'><strong>Role:</strong> {user?.role}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  )
}

export default Profile