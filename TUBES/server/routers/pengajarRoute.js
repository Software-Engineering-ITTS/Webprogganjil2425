import express, { Router } from 'express';
import {createMatkul,fetchAllMatkul,editMatkul,StatusMatkul,DeleteMatkul, loginPengajar} from '../controllers/pengajarController.js';
// import { deleteMatkul } from '../models/matkulModel.js';

const router = express.Router();

router.post('/addMK', createMatkul);
router.get('/viewMK', fetchAllMatkul);
router.put('/editMK/:id', editMatkul);
router.post('/login', loginPengajar);

// sengaja saya siapkan 2, 1 nya untuk soft delete dan 1 nya untuk delete beneran
// kata dosen basdat klo data penting ubah status saja jangan dihapus, tapi tetap saya siapkan endpointny
router.put('/dropMK/:id', StatusMatkul); //ini yang soft delet (ngubah status menjadi nonactive)
router.delete('/hapusMK!/:id', DeleteMatkul); //ini yang delete asli
// di viewMK itu get nya by status = 'active' di querynya jadi harusnya yang muncul yang active aja

export default router;