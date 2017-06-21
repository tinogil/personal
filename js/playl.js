var Plaer = {
    puri: null,
    x: 0,
    audioElm: document.createElement("audio"),
    bplay: function() {


        if (this.audioElm.paused == true) {
            this.playAudio(this.audioElm); //  if player is paused, then play the file
        } else {
            this.pauseAudio(this.audioElm); //  if player is playing, then pause
        }

    },
    playAudio: function(audioElm) {
        document.getElementById("platy").innerHTML = "Pausa"; // Set button text == Pause
        // Get file from text box and assign it to the source of the audio element 
        if (this.puri == null) {
            this.getSong();
        };
        this.audioElm.src = this.puri;
        this.audioElm.play();
        document.getElementById("ahora").innerHTML = this.puri;
    },


    pauseAudio: function(audioElm) {
        document.getElementById("platy").innerHTML = "play"; // Set button text == Play
        this.audioElm.pause();
    },
    getSong: function() {

        if (this.x < (sessionStorage.length)) {
            var item = sessionStorage.getItem(sessionStorage.key(this.x));
            if (item) {
                var element = item.split(".");
                this.puri = "programas/" + element[1].trim() + "." + element[2].trim();
                this.x++;
            }
        }
    },
}
document.getElementById("platy").addEventListener("click", Plaer.bplay);