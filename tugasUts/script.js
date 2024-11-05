const toastr = document.getElementById('toastr')
document.getElementById('close').hidden=true
document.getElementById('onShow').hidden=true

toastr.addEventListener('click', function() {
    document.getElementById('toastr').hidden=true
    document.getElementById('close').hidden=false
    document.getElementById('onShow').hidden=false
})

const closeBar = document.getElementById('close')
closeBar.addEventListener('click', function(){
    document.getElementById('toastr').hidden=false
    document.getElementById('onShow').hidden=true
    document.getElementById('close').hidden=true

})


const HomeButton = document.querySelector('a[href="#Home"]')
const HomeSection = document.getElementById('Home')
HomeButton.addEventListener('click', () => {
    HomeSection.scrollIntoView({behavior:'smooth'})
})


const ButtonAbout = document.querySelector('a[href="#About"]')
const AboutSection = document.getElementById('About')

ButtonAbout.addEventListener('click', () => {
    console.log("halo")
    AboutSection.scrollIntoView({behavior:'smooth'})
})

