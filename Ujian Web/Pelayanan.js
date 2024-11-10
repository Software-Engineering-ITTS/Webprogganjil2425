
function hanyaSatu(checkbox) {
    const kondisicheckboxs = document.getElementsByName("kondisi");
    kondisicheckboxs.forEach((item) => {
        if (item !== checkbox) item.checked = false;
    });
}

// aturan mengaktifkan dan non aktifkan checkbox untuk ambil antrian
// jadi kalau semisal tidak memilih berkonsultasi secara langsung, maka tidak bisa memilih antrian

const radioYa = document.getElementById('ya');
const radioTidak = document.getElementById('tidak');
const antreancheckboxs = document.querySelectorAll('.antrian .btn-check');

// atur status

function toogleCheckbox() {
    console.log("toogleCheckbox function called");
    if (radioYa.checked) {
        console.log("Konsultasi 'Ya' dipilih, mengaktifkan checkbox antrian");
        antreancheckboxs.forEach((checkbox) => {
            checkbox.disabled = false;
            checkbox.addEventListener('click', function () {
                hanyaSatuAntrean(checkbox);
            });
        });

    } else {
        console.log("Konsultasi 'Tidak' dipilih atau tidak dipilih, menonaktifkan checkbox antrean");
        antreancheckboxs.forEach((checkbox) => {
            checkbox.disabled = true;
            checkbox.checked = false;
        });
    }
}

function hanyaSatuAntrean(checkbox) {
    antreancheckboxs.forEach((item) => {
        if (item !== checkbox) item.checked = false;
    });
}

document.addEventListener("DOMContentLoaded", () => {
    toogleCheckbox();
});



// untuk radio
radioYa.addEventListener('change', toogleCheckbox);
radioTidak.addEventListener('change', toogleCheckbox);


function thnks(){
    window.location.href = "Submit.html";
}
