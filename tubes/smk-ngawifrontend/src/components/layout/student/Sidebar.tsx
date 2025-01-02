import React from 'react'
import { Button } from '../../ui/button'
import { AiOutlineHome , AiOutlineLogout } from "react-icons/ai";
import { TbMessage2 } from "react-icons/tb";
import { Link, useParams } from "react-router-dom"
import { MdOutlinePeopleAlt } from "react-icons/md";
import { MdOutlinePersonOutline } from "react-icons/md";

interface SideBarProps{
}

const SidebarStudent : React.FC<SideBarProps> = ({}) => {
    const {id} = useParams() 
    const sanitizedId = id?.replace(/[^\w-]/g, "")
  return (
    <div className="pb-12 min-h-screen">
        <div className="space-y-4 py-4">
            <div className="px-3 py-2">
                <h2 className="mb-2 px-4 text-lg font-semibold">
                    Student Dashboard
                </h2>
                <div className="space-y-3">
                    <Link to={`/student/dashboard/${sanitizedId}`}>
                        <Button variant={'ghost'} className="w-full hover:bg-yellow-200 justify-start rounded-none hover:text-primary">
                            <AiOutlineHome className="mr-2 text-lg"/>
                            Home
                        </Button>
                    </Link>
                </div>
                {/* <div className="space-y-3">
                    <Link to={`/student/dashboard/${sanitizedId}}/announcement`}>
                        <Button variant={'ghost'} className="w-full hover:bg-yellow-200 justify-start rounded-none hover:text-primary">
                            <TbMessage2  className="mr-2 text-lg"/>
                            Announcement
                        </Button>
                    </Link>
                </div> */}
                <div className="space-y-3">
                    <Link to={`/student/dashboard/${sanitizedId}/profile`}>
                        <Button variant={'ghost'} className="w-full hover:bg-yellow-200 justify-start rounded-none hover:text-primary">
                            <MdOutlinePersonOutline  className="mr-2 text-lg"/>
                            Profile
                        </Button>
                    </Link>
                </div>
            </div>
        </div>
        <div className="space-y-4 py-4">
            <div className="px-3 py-2">
                <div className="space-y-3">
                    <Link to={'/'}>
                        <Button variant={'ghost'} className="w-full text-red-500 hover:bg-red-200 hover:text-red-500 justify-start rounded-none">
                            <AiOutlineLogout className="mr-2 text-lg"/>
                            Logout
                        </Button>
                    </Link>
                </div>     
            </div>
        </div>
    </div>
  )
}

export default SidebarStudent