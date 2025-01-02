import express, { Router } from 'express';
import {createMatkul,fetchAllMatkul,editMatkul,StatusMatkul,DeleteMatkul, loginPengajar} from '../controllers/pengajarController.js';
// import { deleteMatkul } from '../models/matkulModel.js';

const router = express.Router();

router.post('/addMK', createMatkul);
router.get('/viewMK', fetchAllMatkul);
router.put('/editMK/:id', editMatkul);
router.put('/dropMK/:id', StatusMatkul);
router.post('/login', loginPengajar);

router.delete('/hapusMK!/:id', DeleteMatkul); 

export default router;