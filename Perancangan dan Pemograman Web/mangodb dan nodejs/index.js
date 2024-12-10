import express from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "./models/buku.model.js";

const app = express();

dotenv.config();
app.use(express.json());

const MONGO_URL = process.env.MONGO_URL;
const PORT = process.env.PORT;

mongoose
  .connect(MONGO_URL)
  .then(() => {
    console.log("Wowwww database tersambung");
    app.listen(PORT, () => {
      console.log(`Server running on port ${PORT}`);
    });
  })
  .catch((e) => console.log(e));

app.get("/bukuku", async (req, res) => {
  try {
    const Books = await Buku.find();
    res.status(200).json(Books);
  } catch (e) {
    res.status(500).json({ message: "Fetch gagal" });
  }
});

app.get("/bukuku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const Books = await Buku.findById(id);
    res.status(200).json({ message: "Detail buku : ", Books });
  } catch (e) {
    res.status(500).json({ message: "Fetch gagal" });
  }
});

app.post("/bukuku", async (req, res) => {
  try {
    const buku = await Buku.create(req.body);
    res.status(200).json({ message: "Post Success" });
  } catch (error) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});

app.put("/bukuku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndUpdate(id, req.body);
    if (!buku) {
      return res.status(404).json({ message: "Data not found" });
    }
    const updateBuku = await Buku.findById(id);
    res.status(200).json({ message: "Update Success", updateBuku });
  } catch (error) {
    res.status(500).json({ message: error });
  }
});

app.delete("/bukuku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndDelete(id);
    if (!buku) {
      return res.status(404).json({ message: "Data not found" });
    }
    res.status(200).json({ message: "Delete Success" });
  } catch (error) {
    res.status(500).json({ message: error });
  }
});

// kenapa menggunakan async soalnya javascript adalah
// single thread (initnya jalan lurus)
