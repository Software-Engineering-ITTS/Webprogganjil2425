import { apiSlice } from "../api/baseApi";

export const pendaftaranApi = apiSlice.injectEndpoints({
    endpoints: (builder) => ({
        getAllPendaftaran: builder.query({
            query: () => ({
                url:"/pendaftaran",
                method:"GET"
            })
        }),

        // getDetailJurusan: builder.query({
        //     query: (jurusan) => ({
        //         url:`/jurusan/${jurusan}`,
        //         method:"GET"
        //     })
        // }),
    })
})
export const {
     useGetAllPendaftaranQuery, 
} = pendaftaranApi
