import api from "./apiconfig.js";

// Pengajar
export const loginPengajar = (data) => api.post("/pengajar/login", data);
export const addMK = (data) => api.post("/pengajar/addMK", data);
export const viewMK = () => api.get("/pengajar/viewMK");
export const updateMK = (id, data) => api.put(`/pengajar/editMK/${id}`, data);
export const deleteMK = (id) => api.put(`/pengajar/dropMK/${id}`);

// Pembelajar
export const registerPembelajar = (data) => api.post("/pembelajar/register", data);
export const loginPembelajar = (data) => api.post("/pembelajar/login", data);
export const inputMatkul = (id, data) => api.post(`/pembelajar/${id}/inputMatkul`, data);
export const viewAllMatkul = () => api.get("/pembelajar/viewMatkul");
