let start = true;
let time = 5000;

const janji1 = new Promise((resolve, reject) => {
  if (start) {
    setTimeout(() => {
      resolve({
        message: "Succes!",
        code: 200,
      });
    }, time);
  } else {
    setTimeout(() => {
      reject({
        massage: "Failed",
        code: 400,
      });
    }, time);
  }
});

const janji2 = new Promise((resolve, reject) => {
    if (start) {
      setTimeout(() => {
        resolve({
          message: "OK!",
          code: 300,
        });
      }, time);
    } else {
      setTimeout(() => {
        reject({
          massage: "Failed",
          code: 500,
        });
      }, time);
    }
  });

Promise.all([janji1, janji2]).then((values) => {
    console.log(values);
})

// console.log("Mulai");
// janji1.then(
//     Response => {
//         console.log("Benar")
//     } 
// ) .catch(
//     Response => {
//         console.error("Salah")
//     }
// ) .finally (
//     Response => {
//         console.log("Finally")
//     }
// )
// console.log("Selesai");
