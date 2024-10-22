// rejected resolve
let stats = true;
let time = 1000;

const janji1 = new Promise((resolve, reject) => {
  if (stats) {
    setTimeout(() => {});
    resolve({
      message: "Ok!",
      code: 200,
    });
  } else {
    reject({
      message: "bad request",
      code: 400,
    });
  }
});

const janji2 = new Promise((resolve, reject) => {
  if (stats) {
    setTimeout(() => {});
    resolve(
      {
        message: "Ok!",
        code: 200,
      },
      time
    );
  } else {
    reject(
      {
        message: "bad request",
        code: 400,
      },
      time
    );
  }
});

Promise.all([janji1, janji2]).then((values) => {
  console.log(values);
});

// console.log("mulai");
// // console.log(janji);
// // kalau janji masuk ke respon, kalau ingkar ke catch
// console.log(janji);
// janji
//   .then((response) => {
//     console.log(response);
//   })
//   .catch((respons) => {
//     console.error("salah");
//   })
//   .finally((responsn) => {
//     console.log("finally");
//   });
// console.log("selesai");
