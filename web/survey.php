<html>
<body>
 Hello <?php echo htmlspecialchars($_POST["name"]); ?>!!
 Your favorite sport is: <?php echo htmlspecialchars($_POST["sport"]); ?>.
 Your favorite team is: <?php echo htmlspecialchars($_POST["team"]); ?>.
 <?php
  if($_POST["beenToGame"]=="Yes"){
 	echo "You have been to a game";
 } 
 else{
 	echo "You really should go to a game..";
 }
 ?>
</body>
</html>