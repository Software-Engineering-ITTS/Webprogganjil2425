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
import { Input } from "@/components/ui/input"
import { useLoginMutation } from '@/store/slices/auht.service';
import { useDispatch,   } from 'react-redux';
import { setCredentials } from '@/store/slices/authSlice';


const formSchema = z.object({
    email: z.string().min(1, { message: "This field has to be filled." }).email("This is not a valid email."),
    password: z.string().max(8, {
        message: "Username must be 8 characters.",
      }),
  })

const Login = () => {

  const dispatch = useDispatch()
  const route = useNavigate()
  const [login, {isSuccess, isError}] = useLoginMutation()

    const form = useForm<z.infer<typeof formSchema>>({
        resolver: zodResolver(formSchema),
        defaultValues: {
          email: "",
          password: "",
        },
      })

      async function onSubmit(values: z.infer<typeof formSchema>) {
        try {
          const response = await login(values).unwrap()
          console.log("Login Response:", JSON.stringify(response, null, 2))

          const { data } = response;
          if (!data) {
            throw new Error("User data is missing in the response");
          }
          dispatch(
            setCredentials({
              user: {
                id: data.id,
                email: data.email,
                name: data.name,
                role: data.role,
              },
              token: data.token,
            })
          );
          const { role, id } = response.data
          if (role === 'admin') {
            route("/admin/dashboard")
          } else if (role === 'student' && id) {
            route(`/student/dashboard/${id}`)
          } else {
            throw new Error("Unknown user role")
          }
        } catch (error) {
          console.error("Login failed:", error)
        }
      }

  return (
    <div className='flex flex-col justify-center items-center mt-10'>
      <h1 className='text-2xl font-bold'>Login <span className='text-yellow-400'>Peserta</span> Didik</h1>
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)} className="mt-10 flex flex-col gap-5">
            <FormField
              control={form.control}
              name="email"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Email</FormLabel>
                  <FormControl>
                    <Input placeholder="username" {...field} />
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
                    <Input placeholder="password" type='password' {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />
                <Button type="submit" className='bg-yellow-400 text-black border-2 border-black hover:bg-white hover:border-yellow-400'>Submit</Button>
                <p className='flex gap-2'>Dont have account? 
                    <Link to={'/register/student'}>
                        <button className='font-bold underline'>Sign Up</button>
                    </Link>
                </p>
          </form>
        </Form>
        {isSuccess && <p className="text-green-500 mt-4">Login successfully!</p>}
        {isError && <p className="text-red-500 mt-4">Failed to Login. Please check the email / password.</p>}
    </div>
  )
}

export default Login