import express from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "./models/buku.model";

const app = express();

dotenv.config();
const PORT = process.env.PORT;
const MONGO_URL = process.env.MONGO_URL;


mongoose
    .connect(MONGO_URL)
    .then(() => {
        console.log("Database Berhasil Tersambung")
        app.listen(PORT, () => {
            console.log(`Server Berjalan Di Port ${PORT}`)
        })
    })
    .catch((e) => console.log(e));

app.get("/buku", async (req, res) => {
    try {
        const Books = await Buku.find();
        res.status(200).json(Books);
    } catch (e) {
        res.status(500).json({ message: "Fetch Failed" })
    }
});

app.post("/buku", async (req, res) => {
    try{
        const buku = await Buku.create(req.body);
        req.status(200).json({message: "Post Success", buku})
    } catch (error){
        res.status(500).json({message: "Failed Post"});
    }
});

app.put("/buku/:id", async(req, res)=>{
    try{
        const {id} = req.params
        const buku = await Buku.findByIdAndUpdate(id, req.body);
        if(!buku){
            return res.status(404).json("Data Not Found")
        }
        const updateBuku = await Buku.findById(id);

        res.status(200).json("Update Succss");
    }catch(e){
        res.status(500).json(`Fetch Failed :  ${e}`);
    }
});

app.delete("/buku/:id", async(req, res)=>{
    try{
        const {id} = req.params
        const buku = await Buku.findByIdAndDelete(id);
        if(!buku){
            return res.status(404).json("Data Not Found")
        }
        res.status(200).json("Delete Succss");
    }catch(e){
        res.status(500).json(`Fetch Failed :  ${e}`);
    }
});
app.get("/buku/:id", async(req, res)=>{
    try{
        const {id} = req.params
        const buku = await Buku.findById(id);
        if(!buku){
            return res.status(404).json("Data Not Found")
        }
        res.status(200).json(buku);
    }catch(e){
        res.status(500).json(`Fetch Failed :  ${e}`);
    }
});
