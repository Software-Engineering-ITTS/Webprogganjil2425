const dataLengkapbtn = document.querySelector('.button1');
const text = document.querySelector('.therest');
let toggle = true

dataLengkapbtn.addEventListener('click',(e)=>{
    text.classList.toggle('show-more');
    
    if (toggle) {
        document.getElementById('panah').src = 'up.png';
    } else {
        document.getElementById('panah').src = 'dropdown.png';
    }
    
    toggle = !toggle;
})