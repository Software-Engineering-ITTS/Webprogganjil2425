// rejected resolve
let stats = true;

const janji = new Promise((resolve, reject) => {
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

console.log("mulai");
console.log(janji);
console.log("selesai");
