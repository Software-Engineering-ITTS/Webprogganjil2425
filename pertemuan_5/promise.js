// rejected, resolve

// study casenya mengambil api 

// fetch mengembalikan promise

let stats = true
time = 1000

const janji = new Promise((resolve, reject) => {
    if(stats){
        setTimeout(() => {
            resolve({
                message: "Ok!",
                code: 200,
            })
        }, 2000)

    } else {
        setTimeout(() => {
            reject({
                message:"bad request",
                code:400
            })
        }, 2000)
    }
}) 

const janji2 = new Promise((resolve, reject) => {
    if(stats){
        setTimeout(() => {
            resolve({
                message: "Oke gas!",
                code: 200,
            })
        }, time)

    } else {
        setTimeout(() => {
            reject({
                message:"bad request",
                code:400
            })
        }, time)
    }
})



Promise.all([janji, janji2]).then((values) => {
    console.log(values)
})


// console.log("mulai")
// console.log(janji)
// janji.then(
//     response => {
//         console.log(response)
//     }
// ).catch(
//     response => {
//         console.log(response)
//     }
// ).finally(
//     response => {
//         console.log("final")
//     }
// )
// console.log("selesai")
