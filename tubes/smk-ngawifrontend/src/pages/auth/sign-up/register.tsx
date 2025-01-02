import React from 'react'
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
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select"
 
import { Input } from "@/components/ui/input"
import { useRegisterMutation } from '@/store/slices/auht.service';
import { useGetAllJurusanQuery } from '@/store/slices/jurusanSlice.service';
import { Jurusan } from '@/interfaces/jurusan';

const formSchema = z.object({
    name: z.string().min(2, {
      message: "Username must be at least 2 characters.",
    }),
    nama_lengkap: z.string().min(2, {
      message: "Nama Lengkap must be at least 2 characters.",
    }),
    tanggal_lahir: z.string().date("Please input valid date"),
    jenis_kelamin: z
    .string({
      required_error: "Please select gender to display.",
    }),
    nomor_telepon: z.string().min(2, {message : "Phone number must be at least 2 characters "}),
    asal_sekolah: z
    .string({
      required_error: "Please insert your past school.",
    }).min(2, {message: "Asal sekolah jangan kosong!"}),
    alamat: z
    .string({
      required_error: "Please insert your address.",
    }).min(2, {message: "Address must be filled"}),
    jurusan_id: z
    .string({
      required_error: "Please insert your desired jurusan.",
    }),
    email: z.string().min(1, { message: "This field has to be filled." }).email("This is not a valid email."),
    password: z.string().max(8, {
        message: "Password must be 8 characters.",
      }),
    password_confirmation: z.string().max(8, {
      message: "Password must be 8 characters.",
    }),
  })
   

const Register = () => {

  const router = useNavigate() 
  const [register, {isLoading}] = useRegisterMutation()
  const {data : jurusan} = useGetAllJurusanQuery({})
  
  const form = useForm<z.infer<typeof formSchema>>({
          resolver: zodResolver(formSchema),
          defaultValues: {
            name: "",
            nama_lengkap: "",
            tanggal_lahir: "",
            jenis_kelamin:"",
            nomor_telepon:"",
            asal_sekolah:"",
            alamat:"",
            jurusan_id:"",
            email: "",
            password: "",
            password_confirmation:""
          },
        })
  
        async function onSubmit(values: z.infer<typeof formSchema>) {
          try {
            await register(values).unwrap()
            router(`/login`)
          } catch (error) {
            console.error("Registration failed:", error)
          }
        }

  return (
    <div className='flex flex-col justify-center items-center mt-10 '>
        <h1 className='text-2xl font-bold '>Registrasi <span className='text-yellow-400'>Peserta</span>  Didik</h1>
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)} className="
           bg-white rounded-xl p-10 mt-5 gap-8  grid grid-cols-2 justify-center items-center">
            <FormField
              control={form.control}
              name="nama_lengkap"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Nama Lengkap</FormLabel>
                  <FormControl>
                    <Input placeholder="nama lengkap" className='' {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />

            <FormField
              control={form.control}
              name="name"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Username</FormLabel>
                  <FormControl>
                    <Input placeholder="username" {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="tanggal_lahir"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Tanggal Lahir</FormLabel>
                  <FormControl>
                    <Input type='date' {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="jenis_kelamin"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Jenis Kelamin</FormLabel>
                   <Select onValueChange={field.onChange} defaultValue={field.value}>
                      <FormControl>
                        <SelectTrigger>
                          <SelectValue placeholder="Select gender to display" />
                        </SelectTrigger>
                      </FormControl>
                      <SelectContent>
                        <SelectItem value="laki - laki">Laki - Laki</SelectItem>
                        <SelectItem value="perempuan">Perempuan</SelectItem>
                      </SelectContent>
                    </Select>
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="nomor_telepon"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Nomor Telepon</FormLabel>
                  <FormControl>
                    <Input type='number' className='[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none' 
                    placeholder="nomor telepon" {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />

            <FormField
              control={form.control}
              name="asal_sekolah"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Asal Sekolah</FormLabel>
                  <FormControl>
                    <Input placeholder="asal sekolah" {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="alamat"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Alamat</FormLabel>
                  <FormControl>
                    <Input type='text' placeholder="alamat" {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />

            <FormField
              control={form.control}
              name="jurusan_id"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Jurusan yang ingin dipilih</FormLabel>
                   <Select onValueChange={field.onChange} defaultValue={field.value}>
                      <FormControl>
                        <SelectTrigger>
                          <SelectValue placeholder="Select jurusan to display" />
                        </SelectTrigger>
                      </FormControl>
                      <SelectContent>
                        {jurusan?.data?.map((item:Jurusan) => (
                        <SelectItem value={`${item.id}`}>{item.nama_jurusan}</SelectItem>
                        ))}
                      </SelectContent>
                    </Select>
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="email"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Email</FormLabel>
                  <FormControl>
                    <Input placeholder="email" {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="password"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Password</FormLabel>
                  <FormControl>
                    <Input type='password' placeholder="password" {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="password_confirmation"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Confirm Your Password</FormLabel>
                  <FormControl>
                    <Input type='password' placeholder="password confirmation" {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />
              <Button className='bg-yellow-400 col-span-2 border-2 border-black hover:bg-white 
              hover:border-yellow-400 text-black ' type="submit" disabled={isLoading}>
                {isLoading ? "Submitting..." : "Submit"}
              </Button>
          </form>
              <p className='flex gap-2 text-center '>Already have account? 
                  <Link to={'/login'}>
                      <button className='font-bold underline'>Sign In</button>
                  </Link>
              </p>
        </Form>
    </div>
  )
}

export default Register