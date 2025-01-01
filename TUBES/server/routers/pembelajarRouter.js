import express from 'express';
import { registerPembelajar, loginPembelajar, viewLogMatkul, inputMatkul,fetchAllMatkul  } from '../controllers/pembelajarController.js';


const router = express.Router();

router.post('/register', registerPembelajar);
router.post('/login', loginPembelajar);
router.get('/logs/:idPembelajar', viewLogMatkul);  //untuk fitur view matkul yang telah di ambil 

router.get('/viewMatkul', fetchAllMatkul);  

router.post('/:idPembelajar/inputMatkul', inputMatkul); // untuk menginput matkul yang ingin di ambil


export default router;
