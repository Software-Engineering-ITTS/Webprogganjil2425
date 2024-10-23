// rejected resolve
let stats = true;
let time = 1000;

const janji1 = new Promise((resolve, reject) => {
    if (stats) {
        setTimeout(() => {
            resolve({
                message: "Ok!",
                code: 200,
            })
        }, 2000)
    } else {
        setTimeout(() => {
            reject ({
                mesaage: "bad request",
                code: 400,
            })
        }, 2000)
    }
});

const janji2 = new Promise((resolve, reject) => {
    if (stats) {
        setTimeout(() => {
            resolve({
                message: "janji2!",
                code: 200,
            })
        }, time)
    } else {
        setTimeout(() => {
            reject ({
                mesaage: "bad request",
                code: 400,
            })
        }, time)
    }
})

Promise.all([janji1, janji2]).then((values) => {
    console.log(values);
})

// console.log("mulai");
// console.log(janji1);
// // untuk menampilkan selesai timeout
// janji1.then(
//     response => {
//         console.log("benar")
//     }
// ).catch(
//     response => {
//         console.error("salah")
//     }
// ).finally( //tidak peduli salah atau benar akan tetap ditampilkan
//     response => {
//         console.log("finally")
//     }
// )
// console.log("selesai");