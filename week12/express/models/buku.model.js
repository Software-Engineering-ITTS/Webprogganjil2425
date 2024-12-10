import mongoose from "mongoose";

// membuat table di data base menggunakan schema
const schema = new mongoose.Schema(
    {
        title : {type:String, required: [true, "Title is required"]},
        writer : {type:String, required: [true, "writer is required"]},
        genre : {type:String, required: [true, "genre is required"]},
        price : {type:Number, required: [true, "price is required"]},
    }, {
        timestamps: true, 
    }
);

const Buku = mongoose.model("Buku", schema, "buku");

export default Buku;