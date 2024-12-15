import express from "express"; //from express yang di maksud itu bersumber dari folder "node_modules" jadi kalo belum ada maka tidak bisa
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "./models/buku.model.js"; //cara cepatnya tulis ./ nanti akan ada rekomen nya

const app = express();
app.use(express.json()); //harus menggunakan ini untuk menggunakan

dotenv.config();

const MONGO_URL = process.env.MONGO_URL;  //ngambil variabel MONGO_URL dari .env
const PORT = process.env.PORT;

// ketika sudah install mongoose di  terminal maka langsung masuk di package.json
mongoose
.connect(MONGO_URL)
.then(() => {
    console.log("alhamdulillah konek");
    app.listen(PORT, () => {
      console.log(`alhamdulillah srvr jln di port ${PORT} `); //menggunakan petik yang disebelah angka 1
    }); //app ini berasal dari express, tapi di masukin ke variable app di line 5,
    // listen() bertujuan untuk memasukkan ke port
  })
.catch((e) => console.log(e));

// saat ingin install jangan lupa install nodemon dan set di package.json

app.get("/buku", async(req,res)=>{ //app yang di maksud itu dari exspess, lalu function .get
    // lalu yang "/buku" itu untuk aksesnya, menggunakan async karena nodeJS
    try {
        const Books = await Buku.find(); //buku find adalah method mongodb
        res.status(200).json(Books);
    } catch (e) {
        res.status(500).json({message: "innalillah failed"});
    }
});

// Search By Id
app.get("/buku/:id", async (req, res) => {
    try {
        const { id } = req.params; // Mengambil ID dari URL parameter
        const buku = await Buku.findById(id); // Mencari buku berdasarkan ID
        if (!buku) { // Jika buku tidak ditemukan
            return res.status(404).json({ message: "Buku tidak ditemukan" });
        }
        res.status(200).json(buku); // Mengembalikan data buku
    } catch (error) {
        res.status(500).json({ message: "Terjadi kesalahan", error });
    }
});


app.post("/buku", async (req, res) => {
    try {
        const buku = await Buku.create(req.body);
        req.status(200).json({message: "Post Succes", buku});
    } catch (error) {
        res.status(500).json({message: "Fetch Failed", error});
    }
});

app.put("/buku/:id", async (req, res) => {
    try {
        const { id } = req.params;
        const buku = await Buku.findByIdAndUpdate(id, req.body); //findbyidandupdate adalah query dari mongodb nya, jadi temukan id nya lalu update
        if (!buku){ //jika buku tidak ketemu
            return res.status(404).json({message: "Data Not Found"});
        }
        const updateBuku = await Buku.findById(id);// find id terlebih dahulu 
        res.status(200).json({ message: "Update Success", updateBuku}); //baru di respons
    } catch (error) {
        res.status(500).json({message: "fetch failed"});
    }
});

app.delete("/buku/:id", async (req, res) => {
    try {
        const { id } = req.params;
        const buku = await Buku.findByIdAndDelete(id); //findbyidandDelete adalah query dari mongodb nya, jadi temukan id nya lalu update
        if (!buku){ //jika buku tidak ketemu
            return res.status(404).json({message: "Data Not Found"});
        }
        //hilangkan findbyid nya karena mencari id nya sudah langsung diatas, di query findbyIdDelete diatas
        res.status(200).json({ message: "Delete Success", updateBuku}); //baru di respons
    } catch (error) {
        res.status(500).json({message: "fetch failed"});
    }
});