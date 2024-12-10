import express from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "./models/bukumodels.js";

const app = express();
app.use(express.json());

dotenv.config();

const MONGO_URL = process.env.MONGO_URL;
const PORT = process.env.PORT || 3000;

mongoose
  .connect(MONGO_URL)
  .then(() => {
    console.log("Database connected successfully");
    app.listen(PORT, () => {
      console.log(`Server berjalan di port ${PORT}`);
    });
  })
  .catch((e) => {
    console.error("Database connection failed:", e);
  });

app.get("/buku", async (req, res) => {
  try {
    const books = await Buku.find();
    res.status(200).json(books);
  } catch (e) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});

app.post("/buku", async (req, res) => {
  try {
    const buku = await Buku.create(req.body);
    res.status(200).json({ message: "Post Success", buku });
  } catch (error) {
    console.log(error);
    res.status(500).json({ message: "Post Failed", error: error.message });
  }
});

app.put("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndUpdate(id, req.body);
    if (!buku) {
      return res.status(404).json({ message: "Data Not Found" });
    }
    const updateBuku = await Buku.findById(id);
    res.status(200).json({ message: "Update Success", updateBuku });
  } catch (error) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});

app.delete("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndDelete(id);
    if (!buku) {
      return res.status(404).json({ message: "Data Not Found" });
    }
    // const deleteBuku = await Buku.findById(id);
    res.status(200).json({ message: "Delete Success", updateBuku });
  } catch (error) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});