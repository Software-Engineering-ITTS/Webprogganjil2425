//rejected resolve
let stats = true;
let time = 1000;
const janji1 = new Promise((resolve, reject)=>{
    if(stats){
        setTimeout(()=>{
            resolve({
                message: "Ok!",
                Code: 200,
            })
        }, 2000)
    
    }else{
        setTimeout(()=>{
            reject({
                message: "bad request",
                Code: 400,
            })
        }, 2000)
    }
});

const janji2 = new Promise((resolve, reject)=>{
    if(stats){
        setTimeout(()=>{
            resolve({
                message: "Ok!",
                Code: 200,
            })
        }, time)
    
    }else{
        setTimeout(()=>{
            reject({
                message: "bad request",
                Code: 400,
            })
        }, time)
    }    
});

Promise.all([janji1,janji2]).then((values)=> {
    console.log(values);
});

/*
console.log("mulai");
console.log(janji1)
janji1.then(
    Response => {
        console.log("benar")
    }
).catch(
    Response=> {
        console.error("salah")
    }
).finally(
    Response => {
        console.log("finally")
    }
);
console.log("selesai") 
*/