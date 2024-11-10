document.getElementById('aboutme-button').classList.add('active');

document.getElementById("aboutme-button").addEventListener("click", function () {
    document.getElementById("aboutme").classList.remove("d-none");
    document.getElementById("tugas").classList.add("d-none");
    document.getElementById("Education").classList.add("d-none");
    document.getElementById("abmimg").classList.remove("d-none");
    document.getElementById("uas").classList.add("d-none");
    document.getElementById('education-button').classList.remove('active');
    document.getElementById('aboutme-button').classList.add('active');
    document.getElementById('tugas-button').classList.remove('active');
    document.getElementById('uas-button').classList.remove('active');

});

document.getElementById("education-button").addEventListener("click", function () {
    document.getElementById("Education").classList.remove("d-none");
    document.getElementById("tugas").classList.add("d-none");
    document.getElementById("aboutme").classList.add("d-none");
    document.getElementById("abmimg").classList.remove("d-none");
    document.getElementById("uas").classList.add("d-none");
    document.getElementById('education-button').classList.add('active');
    document.getElementById('aboutme-button').classList.remove('active');
    document.getElementById('tugas-button').classList.remove('active');
    document.getElementById('uas-button').classList.remove('active');


});

document.getElementById("tugas-button").addEventListener("click", function () {
    document.getElementById("Education").classList.add("d-none");
    document.getElementById("aboutme").classList.add("d-none");
    document.getElementById("tugas").classList.remove("d-none");
    document.getElementById("uas").classList.add("d-none");
    document.getElementById('tugas-button').classList.add('active');
    document.getElementById("abmimg").classList.add("d-none");
    document.getElementById('aboutme-button').classList.remove('active');
    document.getElementById('education-button').classList.remove('active');
    document.getElementById('uas-button').classList.remove('active');

});

document.getElementById("uas-button").addEventListener("click", function () {
    document.getElementById("Education").classList.add("d-none");
    document.getElementById("aboutme").classList.add("d-none");
    document.getElementById("tugas").classList.add("d-none");
    document.getElementById("uas").classList.remove("d-none");
    document.getElementById('uas-button').classList.add('active');
    document.getElementById("abmimg").classList.add("d-none");
    document.getElementById('aboutme-button').classList.remove('active');
    document.getElementById('education-button').classList.remove('active');
    document.getElementById('tugas-button').classList.remove('active');

});