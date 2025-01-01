import express from "express"; // mengimport expressny a
import cors from 'cors' ;
import pengajarRoute from './routers/pengajarRoute.js';
import pembelajarRouter from './routers/pembelajarRouter.js';
import dotenv from "dotenv";
dotenv.config(); //mengkonfigurasi agar bisa membaca file .env

// import data from './konfig/db.js';
// import tesRoute from './routers/tesRoute.js'; //yang di import nama filenya
import {createAllModels} from "./models/createAll.js";

const app = express(); //membuat objek dari import an express diatas agar bisa digunakan
const PORT = process.env.PORT;

// app.get("/api/hello", (req, res) => {
//     res.status(200).json({ message: 'Hello-=server!' });
//   });
  
app.use(cors());
app.use(express.json());

app.use('/pengajar',pengajarRoute);
app.use('/pembelajar', pembelajarRouter);


createAllModels();


// jangan lupa setelah membuat tables membuat pengajar secraa manual, 
// karena pengajar di anggap default hanya 1
// app.get('/', (req, res) => { 
//   res.send('API Sistem Akademik berjalan!');
// });


app.listen(PORT, ()=>{
    console.log(`hamdallah server running di ${PORT}`);
});
