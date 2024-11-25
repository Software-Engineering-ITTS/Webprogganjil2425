let slideIndex = 0;
showSlides();

function showSlides() {
  let slides = document.getElementsByClassName("slide");
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 3000); 
}

window.onscroll = function() {
  const scrollButton = document.querySelector(".scroll-to-dasbord");
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      scrollButton.style.display = "flex";
  } else {
      scrollButton.style.display = "none";
  }
};

document.querySelector(".scroll-to-dasbord").addEventListener("click", function() {
  const dasbord = document.getElementById("dasbord");
  dasbord.scrollIntoView({ behavior: 'smooth' });
});

