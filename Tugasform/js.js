const chkIzin = document.getElementById('izin');
const chkSakit = document.getElementById('sakit');
const chkDispen = document.getElementById('dispen');
function chkChange(e) {
        const chk = document.getElementById(e);
        chkIzin.checked = e == "izin" && chk.checked
        chkSakit.checked = e == "sakit" && chk.checked
        chkDispen.checked = e == "dispen" && chk.checked
        
}
