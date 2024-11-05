let currentIndex = 0;
const imgContainer = document.getElementById('imgContainer');
const totalImages = imgContainer.children.length;
const imagesPerSlide = 3;

function slide(direction) {
    currentIndex += direction;
    
    // Disable buttons if reached the beginning or end
    document.getElementById('prevBtn').disabled = (currentIndex === 0);
    document.getElementById('nextBtn').disabled = (currentIndex === totalImages - imagesPerSlide);

    // Calculate new position
    const offset = -currentIndex * 200; // width per image
    imgContainer.style.transform = `translateX(${offset}px)`;
}

// Initialize buttons state
slide(0);
