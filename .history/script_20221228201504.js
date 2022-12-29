e = true;
function changer() {
    if (e) {
        document.getElementById("pass").setAttribute("type", "text");
        document.getElementById("eye").src = "images/green.png";
        e = false;
    }
    else {
        document.getElementById("pass").setAttribute("type", "password");
        document.getElementById("eye").src = "images/red.png";
        e = true;

   
    }

}