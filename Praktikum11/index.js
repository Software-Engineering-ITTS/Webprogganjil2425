import express from "express";
import dotenv  from"dotenv";
import mongoose from "mongoose";
import BUKU from"./models/BUKU.model.js";

const app =express();
app.use(express.json());

dotenv.config();

const MONGO_URL = process.env.MONGO_URL;
const PORT = process.env.PORT;

mongoose.connect(MONGO_URL)
.then (()=>{
    console.log("database berhasil tersambung");
    app.listen(PORT, () => {
        console.log(`Server Berjalan di port ${PORT}`)
    });
})
.catch ((e) => console.log (e));


// app.get("/BUKU" ,async(req, res)=>{
//     try{
//         const Books = await BUKU.find();
//         res.status(200).json(Books);
//     }catch(e){
//         res.status(500).json({message:"fetch failed"});
//     }
// });

app.post("/BUKU", async(req , res) =>{
    try{
        console.log(req.body)
        const buku = await BUKU.create(req.body)
        res.status(200).json({message:"post success"})
    }catch (error){
        res.status(500).json({message:"fetch failed"});
    }
});

app.put("/BUKU/:id",async (req , res) =>{
    try{
        const{id} = req.params
        const buku =await BUKU.findByIdAndUpdate(id, req.body);
        BUKU.findByIdAndUpdate;
        if(!BUKU){
            return res.status(404).json({message:"Data Not Found"});
        }
        const updateBuku = await BUKU.findById(id);
        res.status(200).json({message:"update success" , updateBuku});
    }catch(error){
        res.status(500).json({message:"fetch failed"});
    }
});

app.delete("/BUKU/:id",async (req , res) =>{
    try{
        const{id} = req.params
        const buku =await BUKU.findByIdAndDelete(id);
        BUKU.findByIdAndUpdate;
        if(!BUKU){
            return res.status(404).json({message:"Data Not Found"});
        }
        const deleteBuku = await BUKU.findById(id);
        res.status(200).json({message:"delete success" , deleteBuku});
    }catch(error){
        res.status(500).json({message:"fetch failed"});
    }
});

app.get("/BUKU/:id", async(req, res) => {
    try{
        const { id } = req.params
        const Books = await BUKU.findById(id)
        res.status(200).json({ message: "Detail buku : ", Books })      
    } catch(e) {
        res.status(500).json({ message: "Fetch gagal" })
    }
})

