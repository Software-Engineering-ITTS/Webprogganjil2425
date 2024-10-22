// rejected resolve
let stats = true;
let time = 1000;
const janjil = new Promise((resolve, reject) => {
    if (stats) {
        setTimeout(() => {
            resolve({
                message: "ok",
                code: 200,
            })
        }, 2000)

    } else {
        setTimeout(() => {
            reject({
                message: "Bad request",
                code: 400,
            })
        }, 2000)

    }
})
const janjil2 = new Promise((resolve, reject) => {
    if (stats) {
        setTimeout(() => {
            resolve({
                message: "ok",
                code: 200,
            })
        }, time)

    } else {
        setTimeout(() => {
            reject({
                message: "Bad request",
                code: 400,
            })
        }, time)

    }
})
Promise.all([janjil,janjil2]).then((values)=>{
console.log(values);
});


/*
console.log("mulai");
console.log(janjil);
janjil.then(
    response =>{
        console.log("benar")
    }
).catch(
    response => {
        console.error("salah")
    }
).finally(
    response=>{
        console.log("fINALLY")
    }
);

console.log("selesai")
*/