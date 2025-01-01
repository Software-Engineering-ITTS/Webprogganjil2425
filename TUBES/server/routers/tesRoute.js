import express from 'express'; 
import { iniTes } from '../controllers/tesController';
// nge import nama fungsion dari controlleras untuk logicnya di atur disini

const router= express.Router();

router.get('/tes',iniTes); 
//fungsion get ('yang nantinya muncul sebagai halaman', nama fungsion di routenta)
