<DOCTYPE! html>
<html>
 <head>
  <title>Dragons Log In</title>
  <link rel="stylesheet" type="text/css" href="dragonsStyle.css";>
  <script src="dragonsJS.js"></script>
 </head>
 <body>
  <header>
   <h1> Add a player</h1>
  </header>
<div id="innerContent">

<form>
You are:
<input type="radio" name="dStatus" value="player">A Player<br/>
<input type="radio" name="dStatus" value="Alumni">An Alumni<br/>
Name:<br/>
<input type="text" name="name" placeholder="ex. John Doe"><br/>
Jersey Number:
<input type="text" name="jNum" placeholder="ex. 17"><br/>
Position:
<input type="text" name="Pos" placeholder="ex. Outside Defender"><br/>
Years Played:
<input type="text" name="yrsPlayed" placeholder="ex. 3"><br/>
Home Town:
<input type="text" name="hTown" placeholder="ex. Seattle"><br/>
Home State:
<input list="states" name="hState">
 <datalist id="states">
  <option value="AL">
  <option value="AK">
  <option value="AZ">
  <option value="AR">
  <option value="CA">
  <option value="CO">
  <option value="CT">
  <option value="DE">
  <option value="FL">
  <option value="GA">
  <option value="HI">
  <option value="ID">
  <option value="IL">
  <option value="IN">
  <option value="IA">
  <option value="KS">
  <option value="KY">
  <option value="LA">
  <option value="ME">
  <option value="MD">
  <option value="MA">
  <option value="MI">
  <option value="MN">
  <option value="MS">
  <option value="MO">
  <option value="MT">
  <option value="NE">
  <option value="NV">
  <option value="NH">
  <option value="NJ">
  <option value="NM">
  <option value="NY">
  <option value="NC">
  <option value="ND">
  <option value="OH">
  <option value="OK">
  <option value="OR">
  <option value="PA">
  <option value="RI">
  <option value="SC">
  <option value="SD">
  <option value="TN">
  <option value="TX">
  <option value="UT">
  <option value="VT">
  <option value="VA">
  <option value="WA">
  <option value="WV">
  <option value="WI">
  <option value="WY">
 </datalist> 
  Home Country:
  <input type="text" name="hCountry" placeholder="ex. Brazil"><br/>
  Major:
  <input type="text" name="major" placeholder="ex. Business"><br/>

  <input type="submit">Submit

</form>
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