
const animateHeader = document.querySelectorAll('.header-animation')
const animateProfile = document.querySelectorAll('.profile-animation')
const animateProjectCard = document.querySelectorAll('.project-animation')

animateHeader.forEach((e, index) => {
    setTimeout(() => {
        e.classList.add('show')
    }, index * 350) 
})

animateProfile.forEach((e, index) => {
    setTimeout(() => {
        e.classList.add('show')
    }, index * 450) 
})

animateProjectCard.forEach((e, index) => {
    setTimeout(() => {
        e.classList.add('show')
    }, index * 750) 
})
