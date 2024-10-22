//Rejected resolve
let stats = true;
const time = 2000;
const janji = new Promise((resolve, reject) => {
    if(stats) {
        setTimeout(
            resolve(({
                message: "OK",
                code: 200,
            }

            )
        ),2000)
    }else{
        setTimeout(
            reject(({
                message: "Bad request",
                code: 400,
            }

            )
        ),2000)

    }
    
});

const janji2 = new Promise((resolve, reject) => {
    if(stats) {
        setTimeout(
            resolve(({
                message: "OK!",
                code: 200,
            }

            )
        ), time)
    }else{
        setTimeout(
            reject(({
                message: "Bad request",
                code: 400,
            }

            )
        ), time)

    }
    
});

Promise.all([janji, janji2]).then ((values) => {
    console.log(values);
});

// console.log("mulai");
// janji1.then(
//     respon =>{
//         console.log("benar")
//     }
// ).catch(
//     response =>{
//         console.log("salah")
//     }
// ).finally(
//     reaponse =>{
//         console.log("finally")
//     }
// );
// console.log("selesai")