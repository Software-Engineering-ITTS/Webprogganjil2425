// rejected resolve

// fetch() => Promise

let stats = true;
const janji1 = new Promise(
    (resolve, reject) => {
        if (stats) {
            setTimeout(
                () => {
                    resolve({
                        message: "Ok!",
                        code: 200,
                    })
                }, 2000
            )

        } else {
            setTimeout(
                () => {
                    reject({
                        message: "bad request",
                        code: 400,
                    })
                }, 2000
            )

        }
    }
);

console.log("mulai")
console.log(janji1)
console.log("selesai")