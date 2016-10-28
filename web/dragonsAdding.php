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
echo "I'm in PHP";

//Get the data from POST
 $name = $_POST['name'];
 $jNum = $_POST['jNum'];
 $Pos = $_POST['Pos'];
 $yrsPlayed = $_POST['yrsPlayed'];
 $hTown = $_POST['hTown'];
 $hState = $_POST['hState'];
 $hCountry = $_POST['hCountry'];
 $major = $_POST['major'];

 echo "name =$name\n";
 echo "Number =$jNum\n";
 echo "Position =$Pos\n";
 echo "Years Played =$yrsPlayed\n";
 echo "Home Town =$hTown";
 echo "Home State =$hState\n";
 echo "Home Counry =$hCountry\n";
 echo "Major =$major\n";

//Database URL
$dbUrl = getenv('DATABASE_URL');
 echo "I connected to the DB";

if (empty($dbUrl)) {
 //Connect to the Database
	echo "Cannot connect to DATABASE_URL";
$dbUrl = "postgres://postgres:password@localhost:5432/dragonsdb";
}

$dbopts = parse_url($dbUrl);


$dbHost = $dbopts["host"]; 
$dbPort = $dbopts["port"]; 
$dbUser = $dbopts["user"]; 
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');



  
echo "Making PDO";
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
 echo "Made the PDO";
 


    //Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Made 'setAttribute'";
/*
try
{
    $sql = "INSERT INTO player (name, pNum, position, yrsplayed, hometown, homestate, homecountry, major)
    VALUES ('$name', '$jNum', '$Pos', '$yrsPlayed', '$hTown', '$hState', '$hCountry', '$major')";
	
   Execute the query
    exec($db, $sql);
    $newId = $db->lastInsertId();
    echo "New player added";
    }


echo "This is before the 'catch'";
catch(Exception $e)
    {
    echo $sql . "<br>" . $e->getMessage();
die();
    }
/*
$db = null;
*/


?>
 
  </div>
 </body>
</html>