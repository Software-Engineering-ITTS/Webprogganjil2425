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
// console.log(janji);
// kalau janji masuk ke respon, kalau ingkar ke catch
console.log(janji);
janji
  .then((response) => {
    console.log(response);
  })
  .catch((respons) => {
    console.error("salah");
  })
  .finally((responsn) => {
    console.log("finally");
  });
console.log("selesai");
