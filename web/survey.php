<html>
<body>
//Name of the user
 Hello <?php echo htmlspecialchars($_POST["name"]); ?>!!<br>

 //Favorite Sport
 Your favorite sport is: <?php echo htmlspecialchars($_POST["sport"]); ?>.<br>

 //Favorite Team
 Your favorite team is: <?php echo htmlspecialchars($_POST["team"]); ?>.<br>

 //Have they been to a game?
 <?php
  if($_POST["beenToGame"]=="Yes"){
 	echo "You have been to a game";
 } 
 else{
 	echo "You really should go to a game..";
 }
 ?><br>

 //Have they played the sport?
 <?php
  if($_POST["havePlayed"])=="Yes"){
	echo "You have played the sport";
}
else{
	echo "No? Then how do you know it's your favorite?"; 
}
?>

//How good are they? using a switch statement
Based on how good you are, we think
<?php

switch($_POST["howGood"]){
	case "1":
	echo "YOU SHOULD GET OUT THERE AND PLAY MORE!!";
	break;

	case "2":
	echo "YOU SHOULD GO PLAY SOME MORE!";
	break;

	case "3":
	echo "thats ok. It's not meant for everyone.";
	break;

	case "4":
	echo "good for you.";
	break;

	case "5":
	echo "you are mediocre";
	break;

	case "6":
	echo "you are not too bad, but could still use some work.";
	break;

	case "7":
	echo "7? Are you sure?";
	break;

	case "8":
	echo "thats great! You must be really good!";
	break;

	case "9":
	echo "that you should be on our team! We need good players!";
	break;

	case "10":
	echo "since you aren't a pro, you must be full of yourself. Sorry.";
	break;
}
?>


</body>
</html>