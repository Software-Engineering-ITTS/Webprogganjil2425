import mongoose from "mongoose";

const schema = new mongoose.Schema (
    {
    title:{type: String, require: [true, "title is required"]},
    writer:{type: String, require: [true, "writer is required"]},
    genre:{type: String, require: [true, "genre is required"]},
    price:{type: Number, require: [true, "price is required"]}
    },
    {
        timestamps: true,
    }
)

const Buku = mongoose.model("Buku", schema, "buku")

export default Buku;