// rejected resolve

let stats = true;
let time = 1000;

const janji1 = new Promise((resolve, reject)=>{
    if (stats) {
        setTimeout(()=>{
        resolve({
            massage: "Ok!",
            code: 200,
        })
    }, 2000)
    } else {
        setTimeout(() => {
        reject({
            massage: "Bad Request",
            code: 400,
        })
        }, 2000)
    }
})

const janji2 = new Promise((resolve, reject)=>{
    if (stats) {
        setTimeout(()=>{
        resolve({
            massage: "Ok!",
            code: 200,
        })
    }, time)
    } else {
        setTimeout(() => {
        reject({
            massage: "Bad Request",
            code: 400,
        })
        }, time)
    }
})


Promise.all([janji1, janji2]).then((values) => {
    console.log(values);
});

console.log("Mulai");
console.log(janji1)
janji1.then(
    response => {
        console.log("benar")
    }
).catch(
    response => {
        console.error("salah")
    }
).finally(
    response => {
        console.log('finally')
    }
);
console.log("selesai")