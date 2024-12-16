import express from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "../models/buku.model.js";


const app = express();
app.use(express.json());

dotenv.config();

const MONGO_URL = process.env.MONGO_URL;
const PORT = process.env.PORT;

mongoose
.connect(MONGO_URL)
.then
(()=>{
  console.log("DAtabase berhasil tersambung")
  app.listen(PORT, ()=>{
    console.log(`server berjalan di port ${PORT}`);
  });
})

.catch((e) => console.log(e));

app.get("/buku", async(req, res) =>{
  try{
    const Books = await Buku.find()
    res.status(200).json(Books);
  }catch(e){
    res.status(500).json({message: "Fetch Failed"});
  }
});

app.post("/buku", async (req, res) => {
  try {
    const buku = await Buku.create(req.body)
    res.status(200).json({message: "Post Success"});
  } catch (error) {
    res.status(500).json({message: "Fetch failed"});
  }
});

app.put("/buku/:id", async(req,res) => {
  try {
    const { id } = req.params
    const buku = await Buku.findByIdAndUpdate(id, req.body);
    if(!buku){
      return res.status(404).json({message: "data not found"})
    }
    const updateBuku = await Buku.findById(id);
    res.status(200).json({message: "Update Success", updateBuku});
  } catch (error) {
    res.status(500).json({message: "Fetch failed"});
  }
});

aapp.delete("/buku/:id", async(req,res) => {
  try {
    const { id } = req.params
    const buku = await Buku.findByIdAndUpdate(id);
    if(!buku){
      return res.status(404).json({message: "data not found"});
    }
    res.status(200).json({message: "Delete Success", updateBuku});
  } catch (error) {
    res.status(500).json({message: "Fetch failed"});
  }
});

app.get("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findById(id);
    if (!buku) {
      return res.status(404).json({ message: "Data Not Found" });
    }
    res.status(200).json(buku);
  } catch (e) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});
