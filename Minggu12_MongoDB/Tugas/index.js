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
    console.log("Database Connected Successfully");
    app.listen(PORT, () => {
      console.log(`Server running on port ${PORT}`);
    });
  })
  .catch((eror) => console.log(e));

  app.get("/buku/:id", async (req, res) => {
    try {
      const { id } = req.params;
      const Books = await Buku.findById(id);
      res.status(200).json(Books);
    } catch (e) {
      res.status(500).json({ message: "Fetch Failed" });
    }
  });

app.post("/buku", async (req, res) => {
  try {
    const buku = await Buku.create(req.body);
    res.status(200).json({ message: "Post Success", buku });
  } catch (error) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});

app.put("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndUpdate(id, req.body);
    if (!buku) {
      return res.status(404).json({ message: "Data not found" });
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
      return res.status(404).json({ message: "Data not found" });
    }
    const deleteBuku = await Buku.findById(id);
    res.status(200).json({ message: "Delete Success" });
  } catch (error) {
    res.status(500).json({ message: "Fetch Failed" });
  }
});
