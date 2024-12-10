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
  .connect(MONGO_URL)
  .then(() => {
    console.log("Database berhasil tersambung");
    app.listen(PORT, () => {
      console.log(`Server berjalan di port ${PORT}`);
    });
  })
  .catch((e) => console.log(e));

// read all
app.get("/buku", async (req, res) => {
  try {
    const Books = await Buku.find();
    res.status(200).json(Books);
  } catch (e) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});

// read by id
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

// create
app.post("/buku", async (req, res) => {
  try {
    const buku = await Buku.create(req.body);
    res.status(200).json({ message: "Post Success", buku });
  } catch (e) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});

// update
app.put("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndUpdate(id, req.body);
    if (!buku) {
      return res.status(404).json({ message: "Data Not Found" });
    }
    const updateBuku = await Buku.findById(id);
    res.status(200).json({ message: "Update Success", updateBuku });
  } catch (e) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});

// delete
app.delete("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndDelete(id);
    if (!buku) {
      return res.status(404).json({ message: "Data Not Found" });
    }
    res.status(200).json({ message: "Delete Success" });
  } catch (e) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});