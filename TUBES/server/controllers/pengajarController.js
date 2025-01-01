import {addMatkul, getAllMatkul, updateMatkul, statusMatkul, deleteMatkul} from '../models/matkulModel.js';
import {findPengajarByEmail} from '../models/pengajarModel.js';



export const loginPengajar = async (req, res) => {
    const { email, pass } = req.body; // Ambil email dan password dari body request

    try {
        // Cari dosen berdasarkan email
        const pengajar = await findPengajarByEmail(email);

        // Periksa apakah dosen ditemukan
        if (!pengajar) {
            return res.status(404).json({ message: 'Email tidak ditemukan' });
        }

        // Cocokkan password
        if (pengajar.pass !== pass) {
            return res.status(401).json({ message: 'Password salah' });
        }

        // Jika valid, kirim respon sukses
        res.status(200).json({
            message: 'Login berhasil',
            pengajar: {
                id: pengajar.id,
                name: pengajar.name,
                email: pengajar.email,
            },
        });
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: 'Terjadi kesalahan di Controller', detail: error.message });
    }
};

export const createMatkul = async (req, res) => {
    const { name, description } = req.body;
    try {
        await addMatkul(name, description);
        res.status(200).json({ message: 'Matkul berhasil dibuat' });
    } catch (error) {
        console.log('eror di controller',error);
        res.status(500).json({ error: error.message });
    }
};

export const fetchAllMatkul = async (req, res) => {
    try {
        const matkul = await getAllMatkul();
        res.status(200).json(matkul);
    } catch (error) {
        console.log('eror di controller');
        res.status(500).json({ error: error.message });
    }
};

export const editMatkul = async (req, res) => {
    const { id } = req.params;
    const { name, description } = req.body;
    try {
        await updateMatkul(id, name, description);
        res.status(200).json({ message: 'Matkul berhasil di edit' });
    } catch (error) {
        console.log('eror di controller');
        res.status(500).json({ error: error.message });
    }   
};

export const StatusMatkul = async (req, res) => {
    const { id } = req.params;
    try {
        await statusMatkul(id);
        res.status(200).json({ message: 'Matkul berhasil di hapus(stts)' });
    } catch (error) {
        console.log('eror di controller');
        res.status(500).json({ error: error.message });
    }
};

export const DeleteMatkul = async (req, res) => {
    const { id } = req.params;
    try {
        await deleteMatkul(id);
        res.status(200).json({ message: 'Kata Pak D harusnya jangan dihapus' });
    } catch (error) {
        console.log('eror di controller');
        res.status(500).json({ error: error.message });
    }
};
