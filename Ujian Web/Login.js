function manualLogin() {
    const Username = document.getElementById('Username').value;
    const Password = document.getElementById('Password').value;

    for (let i = 0; i < Username.length; i++) {
        const char = Username[i];
        if (!(char >= 'A' && char <= 'Z') && !(char >= 'a' && char <= 'z')) {
            alert("Username Tidak Boleh Mengandung Angka");
            return;
        }
    }
    if (Password.length < 10) {
        alert("Password Harus Minimal 10 Kata");
        return;
    }
    alert("Login Berhasil");
    window.location.href = "Pelayanan.html"
}