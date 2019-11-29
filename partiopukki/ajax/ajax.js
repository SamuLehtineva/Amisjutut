//Annetaan arvo ja tiedostonimi
function search(value, filename) {
    //Luo HTTPRequestin
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //Kun  HTTPRequest on valmis, kutsutaan AjaxOnReady funktiota
            AjaxOnReady(this.responseText);
        }
    };
    //Lähetä HTTPRequest
    xmlhttp.open("GET", filename + ".php?v=" + value, true);
    xmlhttp.send();
}
//CTRL + C, CTRL + V
function search2(value, filename) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            AjaxOnReady2(this.responseText);
        }
    };
    xmlhttp.open("GET", filename + ".php?v=" + value, true);
    xmlhttp.send();
}
function search3(value, filename) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            AjaxOnReady3(this.responseText);
        }
    };
    xmlhttp.open("GET", filename + ".php?v=" + value, true);
    xmlhttp.send();
}