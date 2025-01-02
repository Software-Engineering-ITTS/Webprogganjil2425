import { loginPembelajar } from "./api/endpoints.js";

// Login Pembelajar
document.getElementById("login-form").addEventListener("submit", async (e) => {
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
        const response = await loginPembelajar({ email, password });
        alert("Login berhasil!");
        window.location.href = "./dashboardPembelajar.html";
    } catch (error) {
        alert("Login gagal. Periksa email dan password Anda.");
    }
});
