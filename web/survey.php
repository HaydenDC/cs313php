<html>
<head>
	<link rel="stylesheet" type="text/css" href="survey.css">
</head>
<body>

<header>
 <h1>This is the results page</h1>
</header>

<!--Creat the file-->
<?php
//Make the file
$myFile = fopen("newFile.txt","w") or die("Unable to open/write file:(");

//Users name
$name = " mystery person";

if(!$_POST["name"]){
	fwrite($myFile, "Hello" . $name . "!! ");
}
else{
$name = htmlspecialchars($_POST["name"]);
fwrite($myFile, "Hello " . $name . "!! ");
}

//Users favorite sport
$favSport = "You dont have a favorite sport? ";

if(!$_POST["sport"]){
	fwrite($myFile, $favSport);
}
else{
$favSport = htmlspecialchars($_POST["sport"]);
fwrite($myFile, "Your favorite sport is: " . $favSport . ". ");
}

//Users favorite team
$faveTeam = "You dont have a favorite team? ";

if(!$_POST["team"]){
	fwrite($myFile, $faveTeam);
}
else{
$favTeam = htmlspecialchars($_POST["team"]);
fwrite($myFile, "Your favorite team is: " .  $favTeam . ". ");
}

//Has the user been to a game?
$yGame = "You dont know if you have been to a game? ";
if($_POST["beenToGame"]=="Yes"){
 	$yGame = "We are glad you have been to a " . $favTeam . " game! ";
 	fwrite($myFile, $yGame);
 } 
 elseif($_POST["beenToGame"]=="No"){
 	$yGame = "You really should go to a game.. ";
 	fwrite($myFile, $yGame);
 }
 else{
 fwrite($myFile, $yGame);
}

 //Does the user play the sport?
 $yPlay = "You dont know if you have played the sport? ";
if($_POST["havePlayed"]=="Yes"){
	$yPlay = "We love that you have played the sport. ";
	fwrite($myFile, $yPlay);
}
elseif($_POST["havePlayed"]=="No"){
	$yPlay = "No? Then how do you know it's your favorite? ";
	fwrite($myFile, $yPlay); 
} 
else{
fwrite($myFile, $yPlay . "<br>");
}

//How good is the user?
$goodStart = "Based on how good you say you are, ";
$hGood = "you should actually tell us how good you think you are.";
switch($_POST["howGood"]){
	case "1":
	$hGood = "YOU SHOULD GET OUT THERE AND PLAY MORE!!";
	break;

	case "2":
	$hGood = "YOU SHOULD GO PLAY SOME MORE!";
	break;

	case "3":
	$hGood = "thats ok. It's not meant for everyone.";
	break;

	case "4":
	$hGood = "good for you.";
	break;

	case "5":
	$hGood = "you are mediocre.";
	break;

	case "6":
	$hGood = "you are not too bad, but could still use some work.";
	break;

	case "7":
	$hGood = "7? Are you sure?";
	break;

	case "8":
	$hGood = "thats great! You must be really good!";
	break;

	case "9":
	$hGood = "that you should be on our team! We need good players!";
	break;

	case "10":
	$hGood = " and since you aren't a pro, you must be full of yourself. Sorry.";
	break;
}
fwrite($myFile, $goodStart . $hGood);
fclose($myFile);


?>

<!--Open the file-->
<?php
$theFile = fopen("newFile.txt", "r") or die ("Couldn't open the file dude");
while(!feof($theFile)){
	echo fgets($theFile) . "<br>";
}
fclose($theFile);
?>

</body>
</html>