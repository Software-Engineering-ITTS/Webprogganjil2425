// rejected resolve
let stats = true;
let time = 1000;

const promise1 = new Promise((resolve, reject) => {
    if (stats) {
        setTimeout(() => {
            resolve({
                message: "OK!".
                    code = 200,
            })
        }, 2000)
    } else {
        setTimeout(() => {
            reject({
                message: "Bad Request",
                code: 400,
            })
        }, 2000)
    }
});

const promise2 = new Promise((resolve, reject) => {
    if (stats) {
        setTimeout(() => {
            resolve({
                message: "OK!".
                    code = 200,
            })
        }, time)
    } else {
        setTimeout(() => {
            reject({
                message: "Bad Request",
                code: 400,
            })
        }, time)
    }
});

Promise.all([promise1, promise2]).then((values) => {
    console.log(values);
});

console.log("mulai . . .")
console.log(promise1)
console.log(". . . selesai")