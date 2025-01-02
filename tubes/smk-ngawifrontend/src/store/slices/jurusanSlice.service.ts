import { Jurusan } from "@/interfaces/jurusan";
import { apiSlice } from "../api/baseApi";

export const jurusanApi = apiSlice.injectEndpoints({
    endpoints: (builder) => ({
        getAllJurusan: builder.query({
            query: () => ({
                url:"/jurusan",
                method:"GET"
            })
        }),

        getDetailJurusan: builder.query({
            query: (jurusan) => ({
                url:`/jurusan/${jurusan}`,
                method:"GET"
            })
        }),

        addJurusan: builder.mutation({
            query: ({nama_jurusan, deskripsi_jurusan}) => ({
                url:`/jurusan`,
                method:"POST",
                body: {nama_jurusan, deskripsi_jurusan}
            })
        }),
        updateJurusan: builder.mutation({
            query: ({ jurusan, nama_jurusan, deskripsi_jurusan }) => ({
                url:`/jurusan/${jurusan}`,
                method:"PUT",
                body:{ nama_jurusan, deskripsi_jurusan }
            })
        }),
        deleteJurusan: builder.mutation({
            query: (jurusan:string) => ({
                url:`/jurusan/${jurusan}`,
                method:"DELETE"
            })
        })
    })
})
export const {
     useGetAllJurusanQuery, 
     useGetDetailJurusanQuery,
     useAddJurusanMutation,
     useUpdateJurusanMutation,
     useDeleteJurusanMutation
} = jurusanApi
