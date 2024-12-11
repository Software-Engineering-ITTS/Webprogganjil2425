import express from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "./models/buku_model.js"

const app = express();
app.use(express.json());

dotenv.config();

const Monggo_URL=process.env.Monggo_URL;
const PORT= process.env.PORT;

mongoose.connect(Monggo_URL)
.then(() => {
    console.log("databse berhasil disambung")
    app.listen(PORT, () => {
        console.log(`Server Berjalan di port ${PORT} `);
    });
})
.catch((e) => console.log(e));



app.get("/buku", async(req, res) => {
    try {
        const Books = await Buku. find();
        res.status(200).json(Books);
    }catch(e){
        res.status(500).json({ message: "fetch Failed"});
    }
}); 

app.post("/buku", async (req, res) => {
    try {
        const buku = await Buku.create(req.body);
        console.log(req.body);
        res.status(200).json({ message: "Post Succsess", buku });
    }catch (error) {
        res.status(500).json ({message: "Fetch Failed"});
    }
});

app.put("/buku/:id", async (req, res) =>{
    try {
        const { id } = req.params;
        const buku = await Buku.findByIdAndUpdate(id, req.body);
        if(!buku){
            return res.status(404).json({message: "data not found"});
        }
        const deleteBuku = await Buku.findById(id);
        res.status(200).json({ message: "delete Sucsess" });
    }catch(error){
        res.status(500).json({ message: "fatch failed"});
    }
});

app.delete("/buku/:id", async (req, res) => {
    try {
        const { id } = req.params;
        const buku = await Buku.findByIdAndDelete(id);
        if(!buku){
            return res.status(404).json({message: "data not found"});
        }
        const updateBuku = await Buku.findById(id);
        res.status(200).json({ message: "update Sucsess", updateBuku});
    }catch(error){
        res.status(500).json({ message: "fatch failed"});
    }
});

app.get("/buku/:id", async (req, res) => {
    try{
        const {id} = req.params;
        const buku = await Buku.findById(id);
        res.status(200).json({ message: "Detail Buku : ", buku})
    }catch (error){
        res.status(500).json({ message: "Fetch Failed" });
    }
});