document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    }, {
        threshold: 0.1
    });

    const animatedElements = document.querySelectorAll('.about-container, .skill-card, .portfolio-item');
    
    animatedElements.forEach((el) => {
        el.classList.add('hidden');
        observer.observe(el);
    });
});

//dark mode//
const navbar = document.querySelector('.navbar');
const body = document.body;

if (localStorage.getItem('darkMode') === 'enabled') {
    body.classList.add('dark-mode');
}

document.getElementById('darkModeToggle').addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
    } else {
        localStorage.removeItem('darkMode');
    }
});

window.addEventListener('scroll', () => {
    if (window.scrollY > 0) {
        navbar.classList.add('scrolled'); 
    } else {
        navbar.classList.remove('scrolled');
    }

    if (body.classList.contains('dark-mode')) {
        navbar.classList.add('scrolled');
    }
});




