import mongoose from "mongoose";
const Schema = new mongoose.Schema({
    title: {type: String, required: [true, "tittle tidak ada"]},
    writer: {type: String, required: [true, "penulis tidak ada"]},
    genre: {type: String, required: [true, "genre tidak ada"]},
    price: {type: Number, required: [true, "tidak ada"]},

},
{
    timestamps: true,
}
);

const buku = mongoose.model ("buku", Schema, "buku")
export default buku;