<DOCTYPE! html>
<html>
 <head>
  <title>Dragons Log In</title>
  <link rel="stylesheet" type="text/css" href="dragonsStyle.css";>
  <script src="dragonsJS.js"></script>
 </head>
 <body>
  <header>
   <h1> Thank you for adding!</h1>
  </header>
<div id="innerContent">
<a href="https://morning-basin-25235.herokuapp.com/dragonsHome.html">Back to home page</a>

 <?php
$name = htmlspecialchars($_POST["name"]);
$jNum = htmlspecialchars($_POST["jNum"]);
$Pos = htmlspecialchars($_POST["Pos"]);
$yrsPlayed = htmlspecialchars($_POST["yrsPlayed"]);
$hTown = htmlspecialchars($_POST["hTown"]);
$hState = htmlspecialchars($_POST["hState"]);
$hCountry = htmlspecialchars($_POST["hCountry"]);
$major = htmlspecialchars($_POST["major"]);


//Database URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 //Connect to the Database
 $dbUrl = "postgres://postgres:password@localhost:5432/dragonsdb";
}

$dbopts = parse_url($dbUrl);


$dbHost = $dbopts["host"]; 
$dbPort = $dbopts["port"]; 
$dbUser = $dbopts["user"]; 
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
    $conn = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    //Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO player (name, pNum, position, yrsplayed, hometown, homestate, homecountry, major)
    VALUES ('$name', '$jNum', '$Pos', '$yrsPlayed', '$hTown', '$hState', '$hCountry', '$major')";
	
    //Execute the query
    exec($conn, $sql);
    $newId = $conn->lastInsertId();
    echo "New player added";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


?>

 </body>
</html>