// reject resolve
let stats = true
let time = 1000;

const janji1 = new Promise((resolve, reject) => {
    if (stats) {
      setTimeout(() => {
        resolve({
          massage: "OK!",
          code: 200,
        });
      }, 2000);
    } else {
      setTimeout(() => {
        reject({
          massage: "janji1",
          code: "200",
        });
      }, 2000);
    }
  });

  const janji2 = new Promise((resolve, reject) => {
    if (stats) {
      setTimeout(() => {
        resolve({
          massage: "OK!",
          code: 200,
        });
      }, time);
    } else {
      setTimeout(() => {
        reject({
          massage: "janji2",
          code: "200",
        });
      }, time);
    }
  });

  Promise.all([janji1, janji2]).then((values) => {
    console.log(values);
  });
  
  console.log("mulai");
  janji1.then(
      respone =>{
          console.log(respone)
      }
  ).catch(
      respone =>{
          console.error("salah")
      }
  );
  console.log("selesai");

  console.log("mulai....")
  console.log(janji1)
  console.log("....selesai")