<<<<<<< HEAD
// reject resolve
let.time = values;
let stats = true;
const janji1 = new Promise((resolve, reject) => {
  if (stats) {
    setTimeout(() => {
      resolve({
        massage: "OK!",
        code: 200,
      });
    });
  } else {
    setTimeout(() => {
      reject({
        massage: "bad request",
        code: "200",
      });
    });
  }
});

const janji2 = new Promise((resolve, reject) => {
    
  if (stats) {
    setTimeout(() => {
      resolve({
        massage: "OK!",
        code: 200,
      });
    });
  } else {
    setTimeout(() => {
      reject({
        massage: "bad request",
        code: "200",
      });
    },time);
  }
});



Promise.all([janji1,janji2]).then((values) =>{
    console.log(values);
})


//console.log("mulai");
//janji1.then(
  //  respone =>{
    //    console.log(respone)
    //}
//).catch(
  //  respone =>{
    //    console.error("salah")
   // }
//);
//console.log("selesai");
=======
// reject resolve
let.time = values;
let stats = true;
const janji1 = new Promise((resolve, reject) => {
  if (stats) {
    setTimeout(() => {
      resolve({
        massage: "OK!",
        code: 200,
      });
    });
  } else {
    setTimeout(() => {
      reject({
        massage: "bad request",
        code: "200",
      });
    });
  }
});

const janji2 = new Promise((resolve, reject) => {
    
  if (stats) {
    setTimeout(() => {
      resolve({
        massage: "OK!",
        code: 200,
      });
    });
  } else {
    setTimeout(() => {
      reject({
        massage: "bad request",
        code: "200",
      });
    },time);
  }
});



Promise.all([janji1,janji2]).then((values) =>{
    console.log(values);
})


//console.log("mulai");
//janji1.then(
  //  respone =>{
    //    console.log(respone)
    //}
//).catch(
  //  respone =>{
    //    console.error("salah")
   // }
//);
//console.log("selesai");
>>>>>>> 0fa4cf140bcf507f319929214d0fcd63a7d59945
