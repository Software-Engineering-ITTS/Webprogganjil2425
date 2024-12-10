import mongoose from "mongoose";

const schema = new mongoose.Schema(
    {
        title: { type: String, required: [true, "Title is required"] },
        writer: { type: String, required: [true, "Writer is required"] },
        genre: { type: String, required: [true, "Gender is required"] },
        price: { type: Number, required: [true, "Price is required"] },

    },
    {
        timestamps: true,
    }
);

const Buku = mongoose.model("Buku", schema, "buku")
export default Buku;