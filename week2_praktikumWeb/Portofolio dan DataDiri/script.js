document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.parallax-layer');

    let currentSlide = 0;

    function updateSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            slide.classList.add('oot')
            if (i === index) {
                slide.classList.add('active');
                slide.classList.remove('oot');
            }
        });
    }

    updateSlide(currentSlide);


    document.getElementById('nextBtn').addEventListener('click', () => {
        currentSlide = (currentSlide + 1) % slides.length;
        updateSlide(currentSlide);
        console.log(currentSlide)
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        updateSlide(currentSlide);
        console.log(currentSlide)
    });

    document.addEventListener('wheel', (event) => {
        if (event.ctrlKey) {
            event.preventDefault();
            if (event.deltaY > 0) {
                
                currentSlide = (currentSlide + 1) % slides.length;
            } else {
                
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            }
            updateSlide(currentSlide);
            console.log(currentSlide);
        }
    }, { passive: false });
});
