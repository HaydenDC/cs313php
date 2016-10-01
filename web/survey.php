<html>
<body>
<!--Users name-->
 Hello <?php echo htmlspecialchars($_POST["name"]); ?>!!

 <!--Favorite Sport-->
 Your favorite sport is: <?php echo htmlspecialchars($_POST["sport"]); ?>.

 <!--Favorite Team-->
 Your favorite team is: <?php echo htmlspecialchars($_POST["team"]); ?>.

 
 <!--Have they been to a game?-->
 <?php
  if($_POST["beenToGame"]=="Yes"){
 	echo "You have been to a game";
 } 
 else{
 	echo "You really should go to a game..";
 }
 ?><br>

 
<!-- Have they played the sport?-->
 <?php
  if($_POST["havePlayed"])=="Yes"){
	echo "You have played the sport";
}
else{
	echo "No? Then how do you know it's your favorite?"; 
}
?>


<!--How good are they? using a switch statement-->
Based on how good you are, we think
</body>
</html>