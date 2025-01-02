import SidebarAdmin from '@/components/layout/admin/Sidebar'
import React from 'react'
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableFooter,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table"
import { Button } from '@/components/ui/button'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import { FormControl } from '@/components/ui/form'
import { useGetAllPendaftaranQuery } from '@/store/slices/pendaftaranSlice.service'
import { Pendaftaran } from '@/interfaces/pendaftaran'

 

const DataPeserta = () => {
  const {data : pendaftaran} = useGetAllPendaftaranQuery({})
  
  return (
    <div className='flex'>
      <div className='hidden lg:block w-[18%] '>
            <SidebarAdmin  />
      </div>
        <div className='text-black w-full h-full gap-10 p-6 flex-col flex justify-center items-center '>
          <h1 className='text-3xl font-bold'>Data Pendaftar</h1>
          <Table className='mt-20'>
            <TableHeader>
              <TableRow className='text-2xl'>
                <TableHead className="">No</TableHead>
                <TableHead className="">ID Pendaftar</TableHead>
                <TableHead>ID Jurusan</TableHead>
                <TableHead>Tanggal Pendaftaran</TableHead>
                <TableHead>Status</TableHead>
              </TableRow>
            </TableHeader>
              <TableBody className=' '>
            {pendaftaran?.data?.map((item:Pendaftaran) => (
              <TableRow className='bg-gray-50 text-xl hover:bg-yellow-100 duration-300'>
                <TableCell>{item.id}</TableCell>
                <TableCell>{item.user_id}</TableCell>
                <TableCell>{item.jurusan_id}</TableCell>
                <TableCell>{item.tanggal_pendafaran}</TableCell>
                <TableCell>{item.status_pendaftaran}</TableCell>
              </TableRow>
            ))}
            </TableBody>
          </Table>
        </div>
    </div>
  )
}

export default DataPeserta