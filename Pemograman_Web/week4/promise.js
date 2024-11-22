let stats = true;
const time = 2000;
const janji1 = new Promise((resolve, rejected)=>{
    if (stats) {
        setTimeout(()=>{
            resolve({
                message: "OK",
                code : 200,
            })
        }, 2000)

    } else {
        setTimeout(()=>{
            rejected({
                message: "Bad Request",
                code: 400,
            })
        }, 2000)
    }
});

const janji2 = new Promise((resolve, rejected) => {
    if (stats) {
        setTimeout(()=>{
            resolve({
                message: "OK",
                code : 200,
            })
        }, time)

    } else {
        setTimeout(()=>{
            rejected({
                message: "Bad Request",
                code: 400,
            })
        }, time)
    }
});

Promise.all([janji1, janji2]).then((values) => {
    console.log(values);
});
// console.log("mulai");
// console.log(janji1);
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
