// rejectedresolve
// fetch
let stats = true;
let waktu = 1000;
const janji1 = new Promise((resolve, reject) => {
  if (stats) {
    setTimeout(() => {
      resolve({
        message: "ok!",
        code: 200,
      });
    }, 2000);
  } else {
    reject({
      message: "bad request",
      code: 400,
    });
  }
});

const janji2 = new Promise((resolve, reject) => {
    if (stats) {
        setTimeout(() => {
          resolve({
            message: "ok!",
            code: 200,
          });
        }, waktu);
      } else {
        setTimeout(() => {
        reject({
          message: "bad request",
          code: 400,
        });
      }, waktu)
    }
})

Promise.all([janji1, janji1]).then((values) => {
    console.log(values);    
});

// console.log("mulai");
// console.log(janji1)
// janji1.then(
//     Response => {
//     console.log("benar")
// }
// ).catch (
//     Response => {
//     console.error("salah")
// }
// ).finally(
//     Response => {
//         console.log("finally")
//     }
// );
// console.log("selesai");
