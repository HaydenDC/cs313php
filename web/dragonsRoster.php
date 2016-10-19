<html>
<head>
 <link rel="stylesheet" type="text/css" href="dragonsStyle.css">
</head>
<body>
 <header>
  <h1>This is the Roster page</h1>
 </header>
 
 <?php

	echo '<h1>php is working</h1>';
	echo '<h1>php is working</h1>';
	echo '<h1>php is working</h1>';
	


//Database URL
$dbUrl = getenv('HEROKU_POSTGRES_SILVER_URL');

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