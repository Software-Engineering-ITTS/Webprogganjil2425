//rejected
//resolve
//ada method namnaya fetch

let stats = true;
let time = 1000;

// Promise
const janji1 = new Promise((resolve, reject) => {
  if (stats) {
    setTimeout(() => {
      resolve({
        message: "Janji satu ",
        status: "Sukses",
        code: 200,
      });
    }, 1000); // set timeout to 1 second
  } else {
    setTimeout(() => {
      reject({
        message: "Janji satu gagal",
        status: "Gagal",
        code: 404,
      });
    }, 2000); // set timeout to 1 second
  }
});

// Promise2
const janji2 = new Promise((resolve, reject) => {
  if (stats) {
    setTimeout(() => {
      resolve({
        message: "Janji dua ",
        status: "Sukses",
        code: 200,
      });
    }, time); // set timeout to 1 second
  } else {
    setTimeout(() => {
      reject({
        message: "Janji dua gagal",
        status: "Gagal",
        code: 404,
      });
    }, time); // set timeout to 1 second
  }
});

Promise.all([janji1,janji2,]).then((values) => {
    console.log(values);
})


// console.log("Mulai")
// console.log(janji1)
// janji1.then(
//     Response => {
//         console.log("Benar");
//     }
// ).catch(
//     Response => {
//         console.error("Salah")
//     }
// );
// console.log("selesai");


// console.log("gassin");
// console.log(janji);
// console.log("Boom");

// //function
// function Show() {
//   console.log("hahah");
// }

// //arrowFunction
// const ShowArrow = () => {
//   console.log("hahah arrow");
// };



// Handle the promise
//janji
//  .then((response) => console.log(response))
//  .catch((error) => console.error(error));
