//rejected resolve

let stats = true;
let time = 1000;

const janji = new Promise ((resolve, reject) => {
    if (stats) {
      setTimeout(()=>{
        resolve({
            message: "OK!",
            code: 200, 
      })  
        }, 2000)

    }else{
        setTimeout(()=>{
            reject({
                message: "bad request",
                code: 400,  
        })
          }, 2000)
    }
})


const janji2 = new Promise ((resolve, reject) => {
    if (stats) {
      setTimeout(()=>{
        resolve({
            message: "OK!",
            code: 200, 
      })  
        }, time)

    }else{
        setTimeout(()=>{
            reject({
                message: "bad request",
                code: 400,  
        })
          }, time)
    }
})

Promise.all ([janji, janji2]).then((values) => {
    console.log(values);
});

//console.log("mulai");
//console.log(janji);
//janji.then(
  //  Response => {
    //    console.log("benar")
    //}
//).catch(
  //  Response => {
       // console.error("salah")
    //}
//).finally(
  //  Response => {
    //    console.log("finally")
    //}
//);
//console.log("selesai");