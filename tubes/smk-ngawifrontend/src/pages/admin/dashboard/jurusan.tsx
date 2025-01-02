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
import { CiCirclePlus } from "react-icons/ci";
import { GrUpdate } from "react-icons/gr";
import { FaRegTrashAlt } from "react-icons/fa";
import { Link, useNavigate } from 'react-router-dom';
import { useDeleteJurusanMutation, useGetAllJurusanQuery } from '@/store/slices/jurusanSlice.service';
import { Jurusan } from '@/interfaces/jurusan';
import { IoMdHammer } from "react-icons/io";

const JurusanAdmin = () => {

  const {data : jurusan} = useGetAllJurusanQuery({})
  const [deleteJurusan] = useDeleteJurusanMutation()
  const navigate = useNavigate()

  const handleDelete = async(jurusanid:string) => {
    try {
      const isConfirm = window.confirm("Are you sure you want to delete this jurusan?")
      if(!isConfirm){
        return
      }
      await deleteJurusan(jurusanid).unwrap()
    } catch (error) {
      console.error("Failed to delete jurusan:", error)
    } 
  }

  const handleUpdate = async(jurusan:string) => {
    navigate(`/admin/dashboard/updatejurusan/${jurusan}`)
  }

  return (
    <div className='flex'>
      <div className='hidden lg:block w-[18%] '>
            <SidebarAdmin  />
      </div>
        <div className='text-black w-full h-full gap-10 p-6 flex-col flex justify-center items-center '>
          <h1 className='text-3xl font-bold'>
              Jurusan
          </h1>
            
          <Table className=''>
            <TableHeader >
            <Link to={'/admin/dashboard/addjurusan'}>
              <Button className='mb-8 bg-yellow-200 text-black hover:bg-black hover:text-white' >
               <CiCirclePlus className='font-bold' />
                Add jurusan
              </Button>
            </Link>
              <TableRow className='text-2xl'>
                <TableHead className="w-[100px] font-bold">No</TableHead>
                <TableHead className="font-bold">Jurusan</TableHead>
                <TableHead className='font-bold'>Deskripsi Jurusan</TableHead>
                <TableHead className="text-right font-bold">Action</TableHead>
              </TableRow>
            </TableHeader>
            <TableBody className='mt-20 bg-gray-50'>
            {jurusan?.data?.map((item:Jurusan) => (
              <TableRow className='text-xl hover:bg-yellow-100 duration-300  '>
                <TableCell >{item.id}</TableCell>
                <TableCell >{item.nama_jurusan}</TableCell>
                <TableCell >{item.deskripsi_jurusan}</TableCell>
                <TableCell className="items-end justify-end flex gap-5">
                  <Button className='bg-yellow-200 text-black hover:bg-black hover:text-white'
                    onClick={() => handleUpdate(item.slug_jurusan)}>
                    <GrUpdate />
                    Update
                  </Button>
                  <Button className='bg-yellow-200 text-black hover:bg-black hover:text-white'
                  onClick={() => handleDelete(item.slug_jurusan)}>
                    <FaRegTrashAlt />
                    Delete
                  </Button>
                </TableCell>
              </TableRow>
              ))}
            </TableBody>
          </Table>
        </div>
    </div>
  )
}

export default JurusanAdmin