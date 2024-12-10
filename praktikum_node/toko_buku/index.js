import express from "express"
import dotenv from "dotenv"
import mongoose from "mongoose";
import Buku from "./models/buku.model.js";

const app = express();
app.use(express.json());

dotenv.config();
const MONGO_URL = process.env.MONGO_URL
const PORT = process.env.PORT

mongoose
.connect(MONGO_URL)
.then(() => {
    console.log("Database Connected Succesfully");
    app.listen(PORT, ()=>{
        console.log(`Server running on port ${PORT}`);
    });
})
.catch((e) => {
    console.log(e)
})


app.get("/buku", async(req, res)=>{
    try{
        const Books = await Buku.find();
        res.status(200).json(Books);
    }catch(e){
        res.status(500).json("Fetch Failed");
    }
});

app.post("/buku", async(req, res)=>{
    try{
        const buku = await Buku.create(req.body);
        res.status(200).json("Post Success");
    }catch(e){
        res.status(500).json(`Fetch Failed :  ${e}`);
    }
});