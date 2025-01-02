import SidebarAdmin from '@/components/layout/admin/Sidebar'
import React, { useEffect, useState } from 'react'
import { zodResolver } from "@hookform/resolvers/zod"
import { useForm } from "react-hook-form"
import { z } from "zod"
import { Link, useNavigate } from "react-router";
import { Button } from "@/components/ui/button"
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/components/ui/form"

import { Input } from "@/components/ui/input"
import { useAddJurusanMutation, useUpdateJurusanMutation } from '@/store/slices/jurusanSlice.service'
import { Jurusan } from '@/interfaces/jurusan'

const formSchema = z.object({
      nama_jurusan: z.string().min(2, {
      message: "Nama Wali must be at least 2 characters.",
    }),
    deskripsi_jurusan: z.string().min(2, {
        message: "Nama Wali must be at least 2 characters.",
      }),
    
  })

interface FormUpdatejurusanProps{
    selectedJurusan: Jurusan 
}  

const FormUpdateJurusan : React.FC<FormUpdatejurusanProps> = ({selectedJurusan}) => {
  
  const [updateJurusan, { isLoading, isSuccess, isError }] = useUpdateJurusanMutation({})

  const form = useForm<z.infer<typeof formSchema>>({
    resolver: zodResolver(formSchema),
    defaultValues: {
      nama_jurusan: selectedJurusan?.nama_jurusan || '',
      deskripsi_jurusan: selectedJurusan?.deskripsi_jurusan || '',
    },
  })

  useEffect(() => {
    if (selectedJurusan) {
      form.reset({
        nama_jurusan: selectedJurusan.nama_jurusan,
        deskripsi_jurusan: selectedJurusan.deskripsi_jurusan,
      });
    }
  }, [selectedJurusan, form])

  async function onSubmit(values: z.infer<typeof formSchema>) {
    try {
      const response = await updateJurusan({
        jurusan: selectedJurusan.slug_jurusan,
        nama_jurusan: values.nama_jurusan,
        deskripsi_jurusan: values.deskripsi_jurusan,
      })
      console.log('Jurusan updated successfully:', response)
    } catch (error) {
      console.error('Failed to create jurusan:', error)
    }
  }
  

return (
    <div className='flex'>
        <div className='hidden lg:block w-[18%] '>
            <SidebarAdmin  />
        </div>
      <div className='flex flex-col justify-center items-center mt-10 w-full h-full '>
        <h1 className='text-2xl font-bold '>Update <span className='text-yellow-400'>Jurusan</span>  </h1>
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)} className="
           bg-white rounded-xl p-10 mt-5 gap-8  grid grid-cols-2 justify-center items-center">
            <FormField
              control={form.control}
              name="nama_jurusan"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Nama Jurusan</FormLabel>
                  <FormControl>
                    <Input placeholder="jurusan" className='' {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />  
            <FormField
              control={form.control}
              name="deskripsi_jurusan"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Deksripsi Jurusan</FormLabel>
                  <FormControl>
                    <Input placeholder="deksripsi jurusan" className='' {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />  
              <Button className='bg-yellow-400 col-span-2 border-2 border-black hover:bg-white hover:border-yellow-400 text-black ' type="submit">
                {isLoading ? 'Updating...' : 'Submit'}
              </Button>
          </form>
        </Form>
        {isSuccess && <p className="text-green-500 mt-4">Jurusan created successfully!</p>}
        {isError && <p className="text-red-500 mt-4">Failed to create jurusan. Please try again.</p>}
      </div>
    </div>
  )
}

export default FormUpdateJurusan