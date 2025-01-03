import {findPembelajarByEmail, insertPembelajar} from '../models/pembelajarModel.js'; //pemblejara
import {findLogByPembelajar, addLogMatkul} from '../models/logModel.js'; //direct log model
import {getAllMatkul} from '../models/matkulModel.js';


export const fetchAllMatkul = async (req, res) => {
    try {
        const matkul = await getAllMatkul();
        res.status(200).json(matkul);
    } catch (error) {
        console.log('eror di controller');
        res.status(500).json({ error: error.message });
    }
};

export const inputMatkul = async (req, res) => {
    const { idPembelajar } = req.params; // yang ini mengambil idnya dari url
    const {  idMatkul } = req.body;

    try {
        const result = await addLogMatkul(idPembelajar, idMatkul);

        res.status(200).json({ message: 'Mata kuliah berhasil diinput', result });
    } catch (error) {
        console.error(error);
        res.status(500).json({ error: 'Gagal menginput mata kuliah', detail: error.message });
    }
};

export const viewLogMatkul = async (req, res) => {
    const { idPembelajar } = req.params;

    try {
        const logs = await findLogByPembelajar(idPembelajar);
        res.status(200).json({ logs });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

export const registerPembelajar = async (req, res) => {
    console.log("ini di controller backend")
    const { name, email, pass, prodi } = req.body;

    try {
        const result = await insertPembelajar(name, email, pass, prodi);
        res.status(200).json({ message: 'Pembelajar register succes', data: result });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};


export const loginPembelajar = async (req, res) => {
    
    const { email, pass } = req.body;

    try {
        const pembelajar = await findPembelajarByEmail(email);

        if (!pembelajar) {
            return res.status(401).json({ error: 'Email tidak ditemukan!' });
        }

        if (pembelajar.pass !== pass) {
            return res.status(401).json({ error: 'Password salah!' });
        }

        res.status(200).json({ message: 'Login sukses', pembelajar });
    } catch (error) {
        console.error(error);
        res.status(500).json({ error: 'Terjadi kesalahan saat login.' });
    }

    // const { email, pass } = req.body;

    // try {
    //     const pembelajar = await findPembelajarByEmail(email);

    //     if (!pembelajar || pembelajar.pass !== pass) {
    //         return res.status(401).json({ error: 'Invalid ' });
    //     }

    //     res.status(200).json({ message: 'Login sukses', pembelajar });
    // } catch (error) {
    //     res.status(500).json({ error: error.message });
    // }
};
