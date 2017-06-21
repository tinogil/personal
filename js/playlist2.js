var showPlaylist = function() {

    //recojemos todos los valores del storage

    for (x = 0; x < (sessionStorage.length); x++) {
        var item = sessionStorage.getItem(sessionStorage.key(x));
        var element = item.split(".");
        var str = "<li class=\"uk-text-center\"  uk-alert id=\"" + sessionStorage.key(x) + "\"><a href=\"#\" name=\"  " + element[1] + "." + element[2] + "\" class=\"\">" + element[0] + "- " + element[1] + "</a><button id=\"button" + element[0] + "\" type=\"button\"  class=\"uk-align-right uk-alert-close \" uk-close></button></li>";
        str = str + document.getElementById("playlist").innerHTML;
        document.getElementById("playlist").innerHTML = str;

    }

};

showPlaylist();
$("#playlist").click(function(e) {
    var z = e.target.id;
    var k = "#" + z;
    var y = $(k).parent();

    sessionStorage.removeItem(y[0].id);
    //$(y[0].id).remove();
    location.reload();
})