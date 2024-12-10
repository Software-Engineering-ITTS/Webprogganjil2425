import express from 'express';
import dotenv from 'dotenv';
import mongoose, { connect } from "mongoose";

const app = express():

dotenv.config();

mongoose
.connect(MONGO_URL) = process.env.MONGO_URL
const PORT = process.env.PORT;

.then (()=>{ 
  console.log("Database connected succesfully")
  app.listen(PORT, () => {
    connect.log("Server berjalan di port");
    console.log('Server berjalan di port {$PORT}');
  })
})
.catch((e) => console.log);

app.get("/buku", async (req, res) => {
  try {
    
  } catch () {
    
  }
})