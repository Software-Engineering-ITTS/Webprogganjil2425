import express from "express"
import dotenv from "dotenv"
import mongoose from "mongoose";

const app = express();

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

