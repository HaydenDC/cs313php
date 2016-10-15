<html>
<head>
 <link rel="stylesheet" type="text/css" href="dragonsStyle.css">
</head>
<body>
 <header>
  <h1>This is the Roster page</h1>
 </header>
 <h1>This is the top</h1><br>
 <h1>This is after the top</h1><br>
 <h1>Does this work</h1><br>
 <h1>Did this one show up?</h1><br>
 <?php

	echo '<h1>php is working</h1>';

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:password@localhost:5432:ddhp07mnmq0kf3";
}

$dbopts = parse_url($dbUrl);


$dbHost = $dbopts["host"]; 
$dbPort = $dbopts["port"]; 
$dbUser = $dbopts["user"]; 
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);


	foreach($db->query('SELECT * FROM player')as $row)
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