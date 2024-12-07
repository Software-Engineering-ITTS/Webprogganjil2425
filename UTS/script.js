<<<<<<< HEAD
  function toggleMusic() {
    const music = document.getElementById("background-music");
    const button = document.getElementById("musicON-OFF");

    if (music.paused) {
        music.play();
        button.innerText = "Click Me! :P";
    } else {
        music.pause();
        button.innerText = "Click Me! :D";
    }
=======
  function toggleMusic() {
    const music = document.getElementById("background-music");
    const button = document.getElementById("musicON-OFF");

    if (music.paused) {
        music.play();
        button.innerText = "Click Me! :P";
    } else {
        music.pause();
        button.innerText = "Click Me! :D";
    }
>>>>>>> 6d2a2ea657f3f1b45f1fb2c6aa861018f31734fa
}