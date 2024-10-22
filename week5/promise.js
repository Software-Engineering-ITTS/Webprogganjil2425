

let stats = true;
let time = 1000;

const janji1 = new Promise((resolve, reject) => {
    if(stats){
        setTimeout(() => {
            resolve({
                message: "OK!",
                code: 200,
            })
        }, 2000)

    }else{
        setTimeout(() => {
            reject({
                message:"bad request",
                code:400,
            })
        }, 2000)
    }
})

const janji2 = new Promise((resolve, reject) =>{
    if(stats){
        setTimeout(() => {
            resolve({
                message: "OK!",
                code: 200,
            })
        }, time)

    }else{
        setTimeout(() => {
            reject({
                message:"bad request",
                code:400,
            })
        }, time)
    }
})
fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)

Promise.all([janji1, janji2]).then((values) =>{
    console.log(values);
});

// console.log("mulai");
// console.log(janji1)
// janji1.then(
//     response => {
//         console.log("benar")
//     }
// ).catch(
//     response => {
//         console.error("salah")
//     }
// ).finally(
//     response => {
//         console.log("finally")
//     }
// );
// console.log("selesai");