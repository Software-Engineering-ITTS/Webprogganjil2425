import express from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "./models/buku.model.js";

const app = express();
app.use(express.json());
dotenv.config();

const MONGO_URL = process.env.MONGO_URL
const PORT = process.env.PORT

mongoose.connect(MONGO_URL)
.then(() => {
    console.log("Database Connected")
    app.listen(PORT, () => {
        console.log(`Server running on port ${PORT}`)
    });
})

.catch((e) => console.log(e));

app.get('/buku', async (req, res) => {
    try {
        const buku = await Buku.find();
        res.status(200).json(buku);
    } catch (e) {
        res.status(500).json({message:"Fetch Failed"});
    }
});

app.get('/buku/:id', async (req, res) => {
    try {
        const {id} = req.params;
        const buku = await Buku.findById(id);
        if (!buku) {
            return res.status(404).json({message:"Book not found"});  
        }
        res.status(200).json(buku);
    } catch (e) {
        res.status(500).json({message:"Fetch Failed"});
    }
});

app.post('/buku', async (req, res) => {
    try {
        const buku = await Buku.create(req.body);
        res.status(200).json({message:"Book created successfully", buku});
    } catch (e) {
        res.status(500).json({message:"Create Failed"});
    }
});

app.put('/buku/:id', async (req, res) => {
    try {
        const {id} = req.params;
        const buku = await Buku.findByIdAndUpdate(id, req.body);
        if (!buku) {
            return res.status(404).json({message:"Book not found"});  
        }
        const updatedBuku = await Buku.findById(id);
        res.status(200).json({message:"Book updated successfully", updatedBuku});
    } catch (e) {
        res.status(500).json({message:"Update Failed"});
    }
});

app.delete('/buku/:id', async (req, res) => {
    try {
        const {id} = req.params;
        const buku = await Buku.findByIdAndDelete(id);
        if (!buku) {
            return res.status(404).json({message:"Book not found"});  
        }
        res.status(200).json({message:"Book deleted successfully"});
    } catch (e) {
        res.status(500).json({message:"Delete Failed"});
    }
});
    