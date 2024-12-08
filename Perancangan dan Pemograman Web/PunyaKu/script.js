const themeToggleButton = document.getElementById('theme-toggle');
const body = document.body;
const navbar = document.querySelector('.navbar');

    themeToggleButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        navbar.classList.toggle('dark-mode');
    
        if (body.classList.contains('dark-mode')) {
            themeToggleButton.textContent.src = 'https://cdn-icons-png.flaticon.com/512/2991/2991148.png';
            themeToggleButton.classList.remove('btn-dark');
            themeToggleButton.classList.add('btn-light-mode');
        } else {
            themeToggleButton.textContent.src = 'https://cdn-icons-png.flaticon.com/512/2991/2991149.png';
            themeToggleButton.classList.remove('btn-light-mode');
            themeToggleButton.classList.add('btn-dark');
        }
    });

