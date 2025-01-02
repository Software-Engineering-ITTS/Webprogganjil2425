import { AiOutlineStock } from "react-icons/ai"
import { FaMoneyBillTrendUp } from "react-icons/fa6"
import { GiNetworkBars } from "react-icons/gi"
import { HiMiniBuildingOffice2 } from "react-icons/hi2"
import { MdElectricBolt } from "react-icons/md"

export const NAVLIST  = [
    {
        key:"home",
        label:"Home"
    },
    {
        key:"about",
        label:"About",
    },
    {
        key:"jurusan",
        label:"Jurusan",
    },
    {
        key:"ekstrakurikuler",
        label:"Ekstrakurikuler",
    },
    {
        key:"location",
        label:"Location",
    },
]

export const HERO = {
    title:"Membangun Masa Depan, Mengasah Keterampilan",
    description:"SMKN 1 NGAWI – Tempatnya Generasi Muda Siap Kerja, Siap Wirausaha, dan Siap Berinovasi.Kualitas Pendidikan Terdepan | 🚀 Teknologi Terkini | 🤝 Kolaborasi Industri",
    hook:"Jadilah Bagian dari Kami!"
}

export const ABOUT = {
    visi:"Lulusan SMK Negeri 1 Ngawi yang cerdas, kompetitif, dan berkarakter pancasila", 
    misi : [
        "1. Menyelenggarakan pendidikan berkualitas yang berfokus pada penguasaan keterampilan sesuai dengan kebutuhan dunia industri dan teknologi terkini.",
        "2. Membangun karakter siswa yang berintegritas, disiplin, dan bertanggung jawab melalui pendidikan berbasis nilai-nilai moral dan etika.",
        "3. Mengembangkan kurikulum adaptif yang mendukung kompetensi lulusan di bidang vokasi serta siap bersaing di dunia kerja dan wirausaha.",
        "4. Meningkatkan kolaborasi dan kemitraan dengan dunia usaha, industri, dan perguruan tinggi dalam rangka menciptakan lulusan yang siap pakai dan profesional.",
        "5. Mengoptimalkan potensi sumber daya sekolah untuk menciptakan lingkungan belajar yang inovatif, kreatif, dan kondusif."
    ]
}


export const JURUSANLIST = [
    {
        icon: <GiNetworkBars />,
        title: "Teknik Komputer Jaringan",  
        description: "Mempelajari perakitan, konfigurasi, dan pemeliharaan jaringan komputer serta teknologi berbasis internet untuk mencetak tenaga profesional di bidang IT." 
    },
    {
        icon: <MdElectricBolt />,
        title: "Teknik Elektronika",
        description: "Mengasah keterampilan dalam merancang, memperbaiki, dan mengoperasikan sistem elektronik untuk berbagai keperluan industri dan rumah tangga."   
    },
    {
        icon: <FaMoneyBillTrendUp />,
        title: "Akuntansi dan Keuangan Lembaga",
        description: "Membekali siswa dengan keterampilan mengelola keuangan, pembukuan, dan analisis keuangan untuk mendukung dunia usaha dan lembaga keuangan."   
    },
    {
        icon: <HiMiniBuildingOffice2 />,
        title: "Manajemen Perkantoran dan Pelayanan Bisnis",
        description: "Mengembangkan kemampuan dalam administrasi perkantoran, manajemen arsip, dan layanan bisnis yang profesional dan terstruktur."   
    },
    {
        icon: <AiOutlineStock />,
        title: "Pemasaran",
        description: "Mempelajari strategi pemasaran modern, teknik penjualan, dan pengembangan bisnis untuk mencetak tenaga profesional di bidang perdagangan dan wirausaha."   
    },
]

export const EKSTRAKURIKULERCAROUSEL = [
    {
        img: "/src/assets/ekstra/futsal.jpeg",
        title: "Futsal",
        description: "Olahraga tim yang melatih kerjasama, ketangkasan, dan sportivitas di lapangan."
    },
    {
        img: "/src/assets/ekstra/paskibra.jpg",
        title: "Paskibra",
        description: "Membentuk disiplin dan jiwa kepemimpinan melalui latihan baris-berbaris dan upacara."
    },
    {
        img: "/src/assets/ekstra/robotics.jpg",
        title: "Robotika",
        description: "Mengembangkan kreativitas dan inovasi dalam merancang serta memprogram robot."
    },
    {
        img: "/src/assets/ekstra/PMR.jpg",
        title: "Palang Merah Remaja (PMR)",
        description: "Belajar keterampilan pertolongan pertama dan meningkatkan kepedulian sosial."
    }
]

export const LOCATION = [
    {
        location:"Jln. Rajawali No.32 Beran 1, Beran, Kecamatan Ngawi, Kabupaten Ngawi, Jawa Timur 63216",
        telp:"(0351) 746081",
        email:"tatausahasmkpgri1ngawi@gmail.com",
        support:"admin@smkpgri1ngawi.sch.id"
    }
]