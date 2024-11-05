let currentIndex = 0;
const imgContainer = document.getElementById('img-container');
const totalImages = imgContainer.children.length;
const imagesPerSlide = 3;

function geser(direction) {
    currentIndex += direction;
    
    // Disable buttons if reached the beginning or end
    document.getElementById('prevBtn').disabled = (currentIndex === 0);
    document.getElementById('nextBtn').disabled = (currentIndex === totalImages - imagesPerSlide);

    // Calculate new position
    const offset = -currentIndex * 400; // width per image
    imgContainer.style.transform = `translateX(${offset}px)`;
}

// Initialize buttons state
geser(0);