import express from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import buku from "./models/buku.model.js"

const app = express();
app.use (express.json());

dotenv.config();
const MONGO_URL = process.env.MONGO_URL;
const PORT = process.env.PORT;

mongoose
.connect(MONGO_URL)
.then (() => {
    console.log("Database Berhasil Tersambung")
    app.listen(PORT, () => {
        console.log(`server berjalan di port ${PORT}`);
    });
})
.catch((e) => console.log(e));

app.get ("/buku", async (req, res) => {
    try {
        const books = await buku.find()
        res.status(200).json(books)
    } catch(e) {
        res.status(500).json({message: "Fetch Failed"});
    }
});

app.post("/buku", async (req, res) => {
    try{
        const buku = await buku.create(req.body)
        res.status(200).json({message: "Post Sukses", buku});
    } catch(error){
        res.status(500).json({message: "Fetch Failed"});
    }
    
});

app.put("/buku/:id", async (req, res) => {
    try{
        const {id} = req.params
        const buku = await buku.findByIdAndUpdate(id, req.body)
        if(!buku){
            return res.status(404).json({message: "Data Not Found"});
        }
        const updatebuku = await buku.findByIdAndUpdate(id);
        res.status (200).json ({message: "Update success", updatebuku});
    } catch (error) {
        res.status(500).json({message: "Fetch Failed"})
    }
});

app.delete ("/buku/:id", async (req, res) => {
    try{
        const {id} = req.params
        const buku = await buku.findByIdAndDelete(id);
        if(!buku) {
            return res.status(404).json ({message: "Data Not Found"});
        }
        res.status (200).json({message: "Delete Success"});
    } catch (error) {
        res.status (500).json ({message: "Fetch Failed"});
    }
});

app.get ("/buku/:id", async (req, res) => {
    try{
        const {id} = req.params
        const buku = await buku.findById(id);
        if(!buku){
            return res.status(404).json({message: "Data Not Found"});
        }
        res.status(200).json(buku);
    } catch(e) {
        res.status(500).json ({message: "Fetch Failed"});
    }
});