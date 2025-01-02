import React, { useEffect, useState } from 'react'
import { MdArrowOutward } from "react-icons/md";
import { Link, useNavigate } from "react-router";

interface NavbarProps {
    navlist : Array<{key:string; label:string}>,
    currentSection : string
    onNavClick : (sectionKey: string) => void
}

const Navbar : React.FC<NavbarProps> = ({navlist, currentSection, onNavClick }) => {

  const [header, setHeader] = useState(false)
  

  const scrollHeader = () => {
    if(window.scrollY >= 20){
        setHeader(true)
    } else {
        setHeader(false)
    }
  }

  useEffect(() => {
    const handleScroll = () => {
        scrollHeader()
    }
    window.addEventListener("scroll", handleScroll)
    return () => {
        window.removeEventListener("scroll", handleScroll)
    }
  }, [])

  return (
    <nav className={`${header ? 'transition-all duration-300 p-5 bg-white lg:shadow-lg z-50 lg:fixed w-full top-0 start-0' : 'bg-transparent p-5'}`}>
        <div className='flex justify-center items-center gap-16'>
            <img src="/src/assets/logo.png" alt="logo" className='w-14 h-14'/>
                <ul className='flex gap-5'>
                    {navlist.map((index) => (
                        <li key={index.key}>
                            <button onClick={() => onNavClick(index.key)} className={`text-xs duration-300 ${currentSection === index.key ? 'text-gray-400' : 'hover:text-gray-500'}`}>
                                {index.label}
                            </button>
                        </li>
                    ))}
                </ul>
            <div className='flex gap-3 text-sm text-center items-center justify-center'>
                
                <Link to={'/login'}>
                    <button>Masuk</button>
                </Link>
                
                <Link to={'/register/student'}>
                <button className='hover:bg-black hover:text-white duration-300 flex gap-1 bg-yellow-400 py-1 px-5 rounded-xl  '>
                    Daftar
                    <MdArrowOutward />
                </button>
                </Link>
            </div>
        </div>
    </nav>
  )
}

export default Navbar