<html>
<body>

<h1>Scriptures</h1>

<?php

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://vfoofmmwyfnovi:bUTWifZtz-HylVrstiWbwmyw2@ec2-50-19-223-15.compute-1.amazonaws.com:5432:ddhp07mnmq0kf3";
}

$dbopts = parse_url($dbUrl);


$dbHost = $dbopts["host"]; 
$dbPort = $dbopts["port"]; 
$dbUser = $dbopts["user"]; 
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);


	foreach($db->query('SELECT book, chapter, verse, content FROM scripture')as $row)
	{
		echo '<p>';
		echo '<strong>' . $row['book'] . '' . $row['chapter'] . ':';
		echo $row['verse'] . '</strong>' . '-' . $row['content'];
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