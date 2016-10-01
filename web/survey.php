<html>
<body>

<h1>This is the results page</h1>

<!--Creat the file-->
<?php
//Make the file
$myFile = fopen("newFile.txt","w") or die("Unable to open/write file:(");

//Users name
$name = htmlspecialchars($_POST["name"]);
fwrite($myFile, $name);

//Users favorite sport
$favSport = htmlspecialchars($_POST["sport"]);
fwrite($myFile, $favSport);

//Users favorite team
$favTeam = htmlspecialchars($_POST["team"]);
fwrite($myFile, $favTeam);

/*Has the user been to a game?
$yGame = "You dont know if you have been to a game?";
if($_POST["beenToGame"]=="Yes"){
 	$yGame = "We are glad you have been to a game";
 } 
 else{
 	$yGame = "You really should go to a game..";
 }
 fwrite($myFile, $yGame);

 //Does the user play the sport?
 $yPlay = "You dont know if you have played the sport?"
if($_POST["havePlayed"]=="Yes"){
	$yPlay = "We love that you have played the sport";
}
else{
	$yPlay = "No? Then how do you know it's your favorite?"; 
} 
fwrite($myFile, $yPlay);

//How good is the user?
$hGood = "you should actually tell us how good you think you are."
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
	$hGood = "you are mediocre";
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
	$hGood = "since you aren't a pro, you must be full of yourself. Sorry.";
	break;
}
fwrite($myFile, $hGood);
fclose($myFile);

*/
?>

<!--Open the file-->
<?php
$myFile = fopen("newFile.txt", "r") or die ("Couldn't open the file dude");
echo fread($myFile, filesize("newFile.txt"));
fclose($myFile);
?>

<h1>Did the file open</h1>
 

</body>
</html>