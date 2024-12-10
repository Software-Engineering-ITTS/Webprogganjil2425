import express from "express"; //from express yang di maksud itu bersumber dari folder "node_modules" jadi kalo belum ada maka tidak bisa
import dotenv from "dotenv";
import mongoose from "mongoose";
import Buku from "./models/buku.model.js"; // cara cepatnya tulis ./ dlu nanti ada rekomendasinya

const app = express();
app.use(express.json()); // harus menggunakan ini untuk menggunakan nya

dotenv.config();

const MONGO_URL = process.env.MONGO_URL; //ngambil variabel MONGO_URL dari .env
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

app.get("/buku", async (req, res) => {
  // app yang di maksud itu dari express, lalu function .get
  // lalu yang "/buku" itu untuk aksesnya, menggunakan async karena nodeJS itu lurus
  // jika semisal ada yang tidak selesai dia bakal nunggu maka agar jalannya paralel menggunakan async
  try {
    const Books = await Buku.find(); // "Buku.find()" merupakan syntax mongodb
    res.status(200).json(Books);
  } catch (e) {
    console.log(e); // lebih baik erornya di log kan agar muncul ketika menteseting
    res.status(500).json({ message: "innalillah failed" });
  }
});

app.post("/buku", async (req, res) => {
  try {
    const buku = await Buku.create(req.body);
    res.status(200).json({ message: "yes POST succed", buku });
  } catch (e) {
    console.log(e);
    res.status(500).json({ message: "yAH FETCH gagal" });
  }
});

app.put("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndUpdate(id, req.body); // yang di dalam kurng syntaxnya mengambil id dari req.body
    // function findByIdAndUpdate() bertujuan untuk mempersingkat syntax
    if (!buku) {
      return res.status(404).json({ message: "ga ketemu" });
    }
    const updateBuku = await Buku.findById(id);
    res.status(200).json({ message: "AlhamduLillah Update", updateBuku });
  } catch (e) {
    console.log(e);
    res.status(500).json({ message: "!fetch " });
  }
});

app.delete("/buku/:id", async (req, res) => {
  try {
    const { id } = req.params;
    const buku = await Buku.findByIdAndDelete(id);
    if (!buku) {
      return res.status(404).json({ message: "!nemu data" });
    }
    res.status(200).json({ message: "kehapus" });
  } catch (e) {
    console.log(e);
    res.status(500).json({ message: "!delete " });
  }
});

app.get("/buku/:id", async (req, res) => {
    try {
      const { id } = req.params; // Ambil ID dari parameter URL
      const buku = await Buku.findById(id); // Cari data berdasarkan ID
      if (!buku) {
        return res.status(404).json({ message: "!nemu data" }); // Jika data tidak ditemukan
      }
      res.status(200).json(buku); // Kirim data buku dalam bentuk JSON
    } catch (e) {
      console.log(e); // Log error jika ada
      res.status(500).json({ message: "!ambil data" }); 
    }
  });
  
