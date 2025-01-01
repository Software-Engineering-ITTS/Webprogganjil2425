import data from '../konfig/db.js';

export const iniTes = async (req, res) => {
try {
    const [rows] = await data.query("select 1");
    res.status(200).json({ message: "hamdalah db konek", dbStatus: "konek bg" });
} catch (e) {
    res.status(500).json({message: "db gagal konek"});  
    console.log(e);
}
};