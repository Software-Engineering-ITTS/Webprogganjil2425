let stat = true;
let time = 100;
const janji = new Promise((resolve, reject) => {
    if (stat) {
        setTimeout(() => {
            resolve({
                massage: "OK",
                code: 200,
            })
        }, 2000)
    }
    else {
        setTimeout(() => {
            reject({
                message: "Bad request",
                code: 400,
            })
        }, 2000)
    }
})

const janji2 = new Promise((resolve,reject) => {
    if (stat) {
        setTimeout(() => {
            resolve({
                massage: "OK",
                code: 200,
            })
        }, time)
    }
    else {
        setTimeout(() => {
            reject({
                message: "Bad request",
                code: 400,
            })
        }, time)
    }
})



Promise.all([janji,janji2]).then((values) => {
 console.log(values);
})

/*
console.log("mulai");
console.log(janji)
janji.then(
    response => {
        console.log("Benar")
    }
).catch(
    response => {
        console.log("Salah")
    }
).finally(
    response => {
        console.log("finally")
    }
);
console.log("Selesai");
*/