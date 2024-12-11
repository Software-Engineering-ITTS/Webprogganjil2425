import express from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "./models/buku.model.js";  



const app = express();
app.use(express.json());

dotenv.config();

const MONGO_URL = process.env.MONGO_URL;
const PORT = process.env.PORT; 

mongoose
.connect (MONGO_URL)
.then(() => {
    console.log("Database connection succesfully")
    app.listen(PORT, () => {
console.log(`server running on port ${PORT}`);
    });
})
.catch((e) => console.log(e));

app.get("/buku", async (req, res) => { //mengambil data buku, menggunakan async untuk jalan paprarel
    try{
        const Books = await Buku.find();
        res.status(200).json(Books);
    }catch (e){
        res.status(500).json({ message: "Fetch Failed"})
    }
});

app.post("/buku/:id", async (req, res) => { //routenya
    try {
        const buku = await Buku.create(req.body); //seperti laravel itu controllernya
        res.status(200).json({message: "post success", buku})
    } catch (error) {
        res.status(500).json({message: "fetch failed"});
    }
});

app.put("/buku", async (req, res) => {
    try {
        const { id } = req.params;
        const buku = await Buku.findByIdAndUpdate(id, req.body);
        if (!buku) {
            return res.status(404).json({ message: "Data Not Found"});
        }
        const updateBuku = await Buku.findById(id);
        res.status(200).json({message: "update succesc", updateBuku});
    }catch (error) {
        res.status(500).json({message: "Fetch Failed"});
    }
});

app.delete("/buku/:id", async (req, res) => {
    try {
        const { id } = req.params;
        const buku = await Buku.findOneAndDelete(id, req.body);
        if (!buku) {
            return res.status(404).json({ message: "Data Not Found"});
        }
        res.status(200).json({message: "delete succesc"});
    } catch (error) {
        res.status(500).json({message: "fetch failed"});
    }
});

app.get("/buku/:id", async (req, res)=> {
    try {
        const {id} = req.params;
        const buku = await Buku.findById(id);
        res.status(200).json({message: "id success", buku})
    } catch (error) {
        res.status(500).json({message: "fetch failed"});
    }
})