import CardsEkstra from '@/components/cards/cards-ekstra'
import { EKSTRAKURIKULERCAROUSEL } from '@/constants/constant'
import React from 'react'

const Ekstrakulikuler = () => {
  return (
    <div className='px-4 lg:px-48 mt-20'>
        <div className='flex flex-col items-center justify-center gap-10'>
            <h1 className='text-3xl font-bold'>Ekstrakurikuler</h1>
            <CardsEkstra ekstraItems={EKSTRAKURIKULERCAROUSEL} />
        </div>
    </div>
  )
}

export default Ekstrakulikuler