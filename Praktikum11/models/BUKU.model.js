import mongoose from"mongoose";

const schema = new mongoose.Schema(
    {
        title:{type:String,required: [true,"title is required"]},
        writer:{type:String,required: [true,"writer is required"]},
        gender:{type:String,required: [true,"gender is required"]},
        price:{type:Number,required: [true,"price is required"]},

    },
{
    timestamps: true,
}
    
);
const BUKU = mongoose.model("BUKU",schema,"BUKU")

export default BUKU;
