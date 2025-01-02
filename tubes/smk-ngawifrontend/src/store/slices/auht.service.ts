import { apiSlice } from "../api/baseApi";

export interface LoginResponse {
  success: boolean
  message: string
  data: {
    id: number
    name: string
    email: string
    email_verified_at: string | null
    nama_lengkap: string
    nomor_telepon: string
    tanggal_lahir: string
    jenis_kelamin: string
    asal_sekolah: string
    jurusan_id: number
    alamat: string; 
    role: "admin" | "student"; 
    created_at: string 
    updated_at: string 
    token: string 
  };
}

export interface LoginCredentials {
  email: string;
  password: string;
}

interface User {
  data: {
    id: number
    name: string
    email: string
    email_verified_at: string | null
    nama_lengkap: string
    nomor_telepon: string
    tanggal_lahir: string
    jenis_kelamin: string
    asal_sekolah: string
    jurusan_id: number
    alamat: string; 
    role: "admin" | "student"; 
    created_at: string 
    updated_at: string 
    token: string 
  }
}

export const authApi = apiSlice.injectEndpoints({
  endpoints: (builder) => ({
    login: builder.mutation<LoginResponse, LoginCredentials>({
      query: (credentials) => ({
        url: "/login",
        method: "POST",
        body: credentials,
      }),
    }),
    register: builder.mutation({
      query: (credentials) => ({
        url: "/register",
        method: "POST",
        body: credentials,
      }),
    }),
    user: builder.query<User, void>({
      query: () => ({
        url: "/user",
        method: "GET",
      })
    })
  }),
})

export const { useLoginMutation, useRegisterMutation, useUserQuery } = authApi;