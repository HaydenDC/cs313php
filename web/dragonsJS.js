//Load Doc
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("content").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "https://morning-basin-25235.herokuapp.com/dragonsHP.html", true);
  xhttp.send();
}

//Load Login
function loadLogIn() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("content").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "https://soundersfc.com", true);
  xhttp.send();
}