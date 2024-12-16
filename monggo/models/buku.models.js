import mongoose from "mongoose";

const schema = new mongoose.Schema(
  {
    tittle: { type: String, required: [true, "tittle is required"]},
    writer: { type: String, required: [true, "writter is required"]},
    genre: { type: String, required: [true, "genre is required"]},
    price: { type: Number, required: [true, "price is required"]},
  },
  {
    timestamps: true,
  }
);

const Buku = mongoose.model("Buku", schema, "buku")

export default Buku;
