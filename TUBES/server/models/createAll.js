import {createPengajarTable} from './pengajarModel.js';
import {createPembelajarTable} from './pembelajarModel.js';
import { createMatkulTable } from './matkulModel.js';
import {createLogTable} from './logModel.js';

export const createAllModels = async ()=> {
try {
    console.log("ini lagi bikin tables");
    await createPengajarTable();
    await createPembelajarTable();
    await createMatkulTable();
    await createLogTable();
} catch (error) {
    console.log(error);
    throw new Error(`eror pas bikin models/tabels : ${error.message}`);
}
};