import React from 'react'
import { useParams } from "react-router";
import FormUpdateJurusan from '../admin/dashboard/formupdatejurusan';
import { useGetAllJurusanQuery, useGetDetailJurusanQuery } from '@/store/slices/jurusanSlice.service';


const FormUpdateJurusanWrapper = () => {
  const { jurusan } = useParams<{ jurusan: string }>()
  const {data : selectedJurusan, data, error, isLoading } = useGetDetailJurusanQuery(jurusan);

  console.log('Param:', jurusan);
  console.log('Data:', data);
  console.log('Error:', error);

  if (isLoading) return <div>Loading...</div>;
  if (error) return <div>Error loading jurusan</div>;
  if (!data) return <div>No jurusan found</div>;

  
    return (
        <FormUpdateJurusan selectedJurusan={selectedJurusan?.data} />
  )
}

export default FormUpdateJurusanWrapper