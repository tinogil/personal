var player = {
    x: "0",
    song: "",
    next: "",
    before: "",
    init = function() {
        if (player.x < (sessionStorage.length)) {
            var item = sessionStorage.getItem(sessionStorage.key(player.x));
            if (item) {
                var element = item.split(".");
                player.song = "programas/" + element[1].trim() + "." + element[2].trim();
                player.x++;
            } else player.song = "http://jazzspain.com:8000/1";
        }
    },
    playSong = function(pro) {
        document.getElementById("play").innerHTML = "Pausa"; // Set button text == Pause
        // Get file from text box and assign it to the source of the audio element 
        player.init();
        audioElm.src = pro;
        audioElm.play();
        document.getElementById("now").innerHTML = player.puri;
    },
    atras = function() {

    },

    alante = function() {

    },
    arto = function() {

    },
    qqueda = function(pro) {

    }
}
player.init();
player.playSong(player.song);