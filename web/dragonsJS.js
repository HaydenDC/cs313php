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
  xhttp.open("GET", "https://morning-basin-25235.herokuapp.com/dragonsLogIn.html", true);
  xhttp.send();
}

//Load Roster
function loadRoster() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("content").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "https://morning-basin-25235.herokuapp.com/dragonsRoster.html", true);
  xhttp.send();
}

//Load Schedule
function loadSchedule() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("content").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "https://morning-basin-25235.herokuapp.com/dragonsSchedule.html", true);
  xhttp.send();
}

//Load Alumni
function loadAlumni() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("content").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "https://morning-basin-25235.herokuapp.com/dragonsAlumni.html", true);
  xhttp.send();
}

//Load Information
function loadInfo() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("content").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "https://morning-basin-25235.herokuapp.com/dragonsInfo.html", true);
  xhttp.send();
}