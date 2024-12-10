import mongoose from "mongoose";

const schema = new mongoose.Schema({
  title: { type: String, required: [true, "Title is required"] },
  writer: { type: String, required: [true, "Writer is required"] },
  gendre: { type: String, required: [true, "Genre is required"] },
  price: { type: Number, required: [true, "Price is required"] },
}

{
  timestamp : true,

}

);

const Buku = mongoose.model("Buku", schema, "buku")


export default Buku;

