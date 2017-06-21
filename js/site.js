var popup = function(event) {

        popo = window.open("player.html", "popo", "location=0,status=0,scrollbars=1,width=400,height=900");
        setTimeout(toto, 1000);

        function toto() {
            popo.Plaer.puri = event;
            popo.Plaer.bplay();
        }

    }
    //playlist
var addPlaylist = function() {
    var programUri = $(".music").attr("name");

    //Averiguamos los nombres de la clave para añadirle  el numero a la ultima
    x = sessionStorage.length;
    if (x > 0) {
        clave = sessionStorage.key(x - 1);

        var a = clave.slice(8);
        var ht = (parseInt(a) + 1) + "." + programUri;
        var c = "programa" + (parseInt(a) + 1);
        sessionStorage.setItem(c, ht);
    } else {
        c = "programa1";
        ht = "1." + programUri;
        sessionStorage.setItem(c, ht);
    }

}


var popo;


//Añade a la playlist la canción
$(".music").click(function() { addPlaylist(); });
document.getElementById("radio").addEventListener("click", function(event) { popup(event.target.getAttribute("uri")); });