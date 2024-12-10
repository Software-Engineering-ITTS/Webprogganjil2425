document.addEventListener("DOMContentLoaded", () => {
  const currentLocation = window.location.pathname;
  const navLinks = document.querySelectorAll(".navbar-text a");

  navLinks.forEach(link => {
    if (link.href.includes(currentLocation)) {
      link.classList.add("active");
    }
  });
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener("click", function(e) {
    e.preventDefault();
    document.querySelector(this.getAttribute("href")).scrollIntoView({
      behavior: "smooth"
    });
  });
});

const audio = document.getElementById('backgroundMusic');
const musicIcon = document.getElementById('musicIcon');
const musicToggleBtn = document.getElementById('musicToggleBtn');
const volumeDownBtn = document.getElementById('volumeDownBtn');
const volumeUpBtn = document.getElementById('volumeUpBtn');

function toggleMusic() {
    if (audio.paused) {
        audio.play();  
        musicIcon.classList.remove('fa-volume-up'); 
        musicIcon.classList.add('fa-volume-mute'); 
    } else {
        audio.pause();  
        musicIcon.classList.remove('fa-volume-mute'); 
        musicIcon.classList.add('fa-volume-up');  
    }
}

function decreaseVolume() {
    if (audio.volume > 0) {
        audio.volume = Math.max(0, audio.volume - 0.1); 
    }
}

function increaseVolume() {
    if (audio.volume < 1) {
        audio.volume = Math.min(1, audio.volume + 0.1); 
    }
}

window.onload = function() {
    audio.play(); 
};

musicToggleBtn.addEventListener('click', toggleMusic);   
volumeDownBtn.addEventListener('click', decreaseVolume);   
volumeUpBtn.addEventListener('click', increaseVolume);    
