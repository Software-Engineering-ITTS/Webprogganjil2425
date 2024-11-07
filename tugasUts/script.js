const navBar = document.querySelector('.nav-class')
window.addEventListener('scroll', () => {
    if( window.scrollY >= 50){
        navBar.classList.add('navbar-scrolled')
    } else {
        navBar.classList.remove('navbar-scrolled')

    }
})



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


const ButtonExp = document.querySelector('a[href="#Exp"]')
const ExpSection = document.getElementById('Exp')

ButtonExp.addEventListener('click', () => {
    console.log("test exp")
    ExpSection.scrollIntoView({behavior:'smooth'})

})


const ButtonProjects = document.querySelector('a[href="#Projects"]')
const ProjectsSection = document.getElementById('Projects')

ButtonProjects.addEventListener('click', () => {
    ProjectsSection.scrollIntoView({behavior:'smooth'})
})

// onLoad Animtaion

