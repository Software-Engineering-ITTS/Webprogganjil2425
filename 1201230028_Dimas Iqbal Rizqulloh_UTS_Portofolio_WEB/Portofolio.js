//Saya tambahkan animasi muncul dari opacity 0 ke atas 100
document.addEventListener("DOMContentLoaded", () => {
  const muncul = document.getElementById("muncul");
  const muncul2 = document.getElementById("muncul2");
  setTimeout(() => {
    muncul.classList.add("show");
    muncul2.classList.add("show");
  }, 300); //kutunda 300 milidetik
});
