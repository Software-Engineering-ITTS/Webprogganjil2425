import React from 'react'
import { Link, useNavigate } from "react-router";
import { HERO } from '../../constants/constant'

const Hero = () => {
  return (
    <div className='px-4 lg:px-48'>
        <div className='gap-10 flex flex-row-reverse justify-center items-center'>
            <div className='hover:scale-105 duration-300 animate-slide-down delay-1000 opacity-0'>
                <img src="/src/assets/hero.png" alt="hero" />
            </div>
            <div className='w-96 flex flex-col gap-5 '>
                <h1 className='text-3xl animate-slide-down font-bold hover:scale-110 duration-300'>{HERO.title}</h1>
                <p className='text-sm hover:scale-110 opacity-0  duration-300 animate-slide-down delay-300'>{HERO.description}</p>
                <h3 className='duration-300 animate-slide-down delay-500 opacity-0'>{HERO.hook}</h3>
                <Link to={'/register/student'}  className='animate-slide-down delay-700 opacity-0  py-2  rounded-xl text-center border-2 border-black bg-yellow-400 duration-300'>
                    <button className=' '>
                        Daftar Sekarang!
                    </button>
                </Link>
            </div>
        </div>
    </div>
  )
}

export default Hero