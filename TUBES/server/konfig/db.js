// link referensi belajar rafid : 
// https://sidorares.github.io/node-mysql2/docs
// https://youtu.be/caDzu0RJeL0?si=0mVDWNtcVMsUuNgX

import mysql from "mysql2/promise"; 
import dotenv from 'dotenv';

dotenv.config(); // untuk mengakses variabel yang ada di dalam .env

const data = mysql.createPool({
    host: process.env.DB_HOST
    ,user: process.env.DB_USER
    ,database: process.env.DB_NAME
});
// semua yang di dalam fungsion createpoool untuk mengambil/mengoneksikan data dari .env

export default data;
// dari sini nanti di panggilnya di models  