import express from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "./models/bukumodels.js";

dotenv.config();

const app = express();
app.use(express.json());

const PORT = process.env.PORT || 3000;
const DB_NAME = process.env.NamaDB;
const COLLECTION_NAME = process.env.namaCollection;

mongoose
  .connect(`${process.env.MONGO_URL}/${DB_NAME}`, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
    serverSelectionTimeoutMS: 5000,
  })
  .then(() => {
    console.log(`Database '${DB_NAME}' connected successfully`);
    app.listen(PORT, () => {
      console.log(`Server berjalan di port ${PORT}`);
    });
  })
  .catch((e) => {
    console.error("Database connection failed:", e.message);
  });

mongoose.connection.on("connected", () => {
  console.log(`Mongoose connected to database '${DB_NAME}'`);
});

mongoose.connection.on("error", (err) => {
  console.error("Mongoose connection error:", err.message);
});

app.get("/buku", async (req, res) => {
  try {
    const books = await Buku.find();
    res.status(200).json(books);
  } catch (e) {
    res.status(500).json({ message: "Fetch Failed", error: e.message });
  }
});

app.post("/buku", async (req, res) => {
  try {
    const { title, writer, genre, price } = req.body;

    console.log("Request Body:", req.body); 

    if (!title || !writer || !genre || !price) {
      return res.status(400).json({ message: "All fields are required" });
    }

    const buku = await Buku.create({ title, writer, genre, price });
    res.status(201).json({ message: "Post Success", buku });
  } catch (error) {
    console.error(error);
    res.status(500).json({ message: "Post Failed", error: error.message });
  }
});

app.put("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const { title, writer, genre, price } = req.body;

    if (!title && !writer && !genre && !price) {
      return res
        .status(400)
        .json({ message: "At least one field is required to update" });
    }

    const buku = await Buku.findByIdAndUpdate(id, req.body, {
      new: true,
      runValidators: true,
    });
    if (!buku) {
      return res.status(404).json({ message: "Data Not Found" });
    }
    res.status(200).json({ message: "Update Success", buku });
  } catch (error) {
    console.error(error);
    res.status(500).json({ message: "Update Failed", error: error.message });
  }
});

app.delete("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndDelete(id);
    if (!buku) {
      return res.status(404).json({ message: "Data Not Found" });
    }
    res.status(200).json({ message: "Delete Success" });
  } catch (error) {
    console.error(error);
    res.status(500).json({ message: "Delete Failed", error: error.message });
  }
});
