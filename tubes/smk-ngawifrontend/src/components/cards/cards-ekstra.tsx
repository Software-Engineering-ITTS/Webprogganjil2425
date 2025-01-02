import React from 'react'

interface CardsEkstraProps {
    ekstraItems : Array<{img:string, title:string, description:string}>
}

const CardsEkstra : React.FC<CardsEkstraProps> = ({ekstraItems}) => {
  return (
    <div className=''>
        <div className='grid grid-cols-4 gap-10'>
            {ekstraItems.map((index, i) => (
                <div key={i} className='hover:scale-110 duration-300'>
                    <img src={index.img} alt="img" className='object-cover h-52 w-full'/>
                    <div className='flex flex-col gap-4 mt-5 '>
                        <h1 className='text-lg font-bold'>{index.title}</h1>
                        <div className='border-2 border-yellow-400' />
                        <p className='text-xs'>{index.description}</p>    
                    </div>
                </div>
            ))}
        </div>
    </div>
  )
}

export default CardsEkstra