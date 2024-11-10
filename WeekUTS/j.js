const dataLengkapbtn = document.querySelector('.button1');
const dataLengkapbtn2 = document.querySelector('.button2');
const text = document.querySelector('.therest');
const text2 = document.querySelector('.therest2');
const text3 = document.querySelector('.therest3');
let toggle = true
let toggle2 = true

dataLengkapbtn.addEventListener('click',(e)=>{
    text.classList.toggle('show-more');
    
    if (toggle) {
        document.getElementById('panah').src = 'up.png';
    } else {
        document.getElementById('panah').src = 'dropdown.png';
    }
    
    toggle = !toggle;
})
dataLengkapbtn2.addEventListener('click',(e)=>{
    text2.classList.toggle('show-more');
    text3.classList.toggle('show-more');
    
    if (toggle2) {
        document.getElementById('panah2').src = 'up.png';
    } else {
        document.getElementById('panah2').src = 'dropdown.png';
    }
    
    toggle2 = !toggle2;
})