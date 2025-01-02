import React, { useEffect } from 'react'

interface BootawalProps{
    booting: () => void
}

const Bootawal : React.FC<BootawalProps> = ({booting}) => {
  
    useEffect(() => {
        const timer = setTimeout(booting, 2000)
        return () => clearTimeout(timer)
    }, [booting])
  
    return (
    <div className='lg:px-32 py-52'>
        <div className='flex flex-col justify-center items-center gap-5'>
            <img src="/src/assets/logo.png" alt="logo" className='object-contain w-72 animate-pulse'/>
            <h1 className='text-2xl font-bold   animate-slide-up '>SMK NGAWI</h1>
        </div>
    </div>
  )
}

export default Bootawal