import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react'
import { RootState } from '../store'

const baseQuery = fetchBaseQuery({
  baseUrl: import.meta.env.VITE_API_BASE_URL, 
  prepareHeaders: (headers, { getState }) => {
    const state = getState() as RootState 
    const token = state.auth.token

    if (token) {
      headers.set("Authorization", `Bearer ${token}`)
    }
    headers.set("Accept", "Application/JSON");
    return headers
  },
})

export const apiSlice = createApi({
  baseQuery: baseQuery,
  endpoints: () => ({}), 
})
