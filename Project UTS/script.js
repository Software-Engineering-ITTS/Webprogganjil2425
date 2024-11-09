// ROLE CHANGER
let roles = [
  "Software Engineering Enthusiast",
  "Junior Web Developer",
  "Junior Graphic Designer",
];
let idxrls = 0;

function changeRole() {
  idxrls += 1;
  if (idxrls >= roles.length) {
    idxrls = 0;
  }
  document.getElementById("role").innerHTML = roles[idxrls];
}

setInterval(changeRole, 2000);

// IMAGE CHANGER
let images = ["me1.jpeg", "me2.jpeg", "me3.jpeg", "me4.jpeg", "me5.jpeg"];
let idximg = 0;

function changeImage() {
  idximg += 1;
  if (idximg >= images.length) {
    idximg = 0;
  }
  document.getElementById("img").src = "Assets/" + images[idximg];
}

setInterval(changeImage, 3000);

// FORM
function validate() {
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  let subject = document.getElementById("subject").value;
  let message = document.getElementById("message").value;

  if (name == "" || email == "" || subject == "" || message == "") {
    alert("Form must be filled out.");
    return false;
  }

  alert("Hi " + name + ", let's connect!");
  clearForm();
  return true;
}

function clearForm() {
    let kosong = "";
    document.getElementById("name").value = kosong;
    document.getElementById("email").value = kosong;
    document.getElementById("subject").value = kosong;
    message = document.getElementById("message").value = kosong
}