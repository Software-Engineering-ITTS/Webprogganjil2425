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
}