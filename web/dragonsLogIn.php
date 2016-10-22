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
<a href="https://mornin-basin-25235.herokuapp.com/dragonsHome.html">Back to home page</a>
 <?php

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
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);


	foreach($db->query('SELECT name, pNumber, position, yrsPlayed, homeTown, homeState, homeCountry, major FROM player')as $row)
	{
		echo '<p>';
		echo '<strong>' . $row['name'] . '' . $row['pNumber'] . '';
		echo $row['position'] . '' . $row['yrsPlayed'];
		echo $row['homeTown'] . ', ' . $row['homeState'];
		echo $row['homeCountry'] . '' . $row['major'] . '.';
		echo '</p>';
	}
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

?>

 </body>
</html>