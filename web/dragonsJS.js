//Load Doc
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("content").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "C:\Users\Hayden\php-getting-started\webdragonsHP.html", true);
  xhttp.send();
}