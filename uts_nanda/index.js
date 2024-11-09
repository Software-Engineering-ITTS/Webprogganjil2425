
// dimulai dari halaman 1
var slideIndex = 1;
showSlides(slideIndex);

// untuk berpindah ke halaman selanjutnnya
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// untuk berpindah dengan nilai yang ada di paramater tersebut
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    
    // perulangan for loop yang dimana akan menonaktifkan semua halaman 
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}