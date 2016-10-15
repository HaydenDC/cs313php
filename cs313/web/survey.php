<?php
	session_start();
	if ($_COOKIE["submitted"] == "yes") {
		header('Location: https://tranquil-garden-61392.herokuapp.com/surveyResults.php');
			exit(); // for security use exit function after redirect
	}

	if ($_SERVER['REQUEST_METHOD']== "POST") {
		
		/***************
		 * CHeck the form for validation to ensure nothing was missed.
		 ***************/
		$error = "";
		$valid = true;
		if (empty($_POST["Political-Party"])) {
			$error .= "<li>You forgot to pick a Political Party</li>";
			$valid = false; // false			
		} 
		if (empty($_POST["Direction"])) {
			$error .= "<li>You forgot to pick whether you think this country is going in the right direction.</li>";
			$valid = false; // false
		} 
		if (empty($_POST["Candidate"])) {
			$error .= "<li>You forgot to pick a candidate</li>";
			$valid = false; // false
		} 
		if (empty($_POST["Watch-Debate"])) {
			$error .= "<li>You forgot to pick whether you watched the debate.</li>";
			$valid = false; // false
		} 
		if (empty($_POST["Changed-Vote"])) {
			$error .= "<li>You forgot to pick if the debate changed your vote.</li>";
			$valid = false; // false
		} 
		if (empty($_POST["Age"])) {
			$error .= "<li>You forgot to pick age group.</li>";
			$valid = false; // false
		} 
		if (empty($_POST["Race"])) {
			$error .= "<li>You forgot to pick race.</li>";
			$valid = false; // false
		} 
		if (empty($_POST["Gender"])) {
			$error .= "<li>You forgot to pick gender.</li>";
			$valid = false; // false
		}

		/***********
		 * If no errors are in the form then we will save the results to 
		 * a file.
		 ***********/
		if ($valid) {
			$fileName = "data/results.txt";

			// Get the results from the text file
			$results = file_get_contents($fileName);
			// Don't include the | in the text file
			$results = explode("|", $results);

			// Convert content from a string to an integer
			$republican =  (int)$results[0];
			$democratic =  (int)$results[1];
			$libertarian = (int)$results[2];
			$otherParty =  (int)$results[3];
			$right =       (int)$results[4];
			$wrong =       (int)$results[5];
			$undecided =   (int)$results[6];
			$trump =       (int)$results[7];
			$hilary =      (int)$results[8];
			$gary =        (int)$results[9];
			$mucmullin =   (int)$results[10];
			$otherVote =   (int)$results[11];
			$wontVote =    (int)$results[12];
			$debateYes =   (int)$results[13];
			$debateNo =    (int)$results[14];
			$changeYes =   (int)$results[15];
			$changeNo =    (int)$results[16];
			$didNotWatch = (int)$results[17];
			$age1829 =     (int)$results[18];
			$age3044 =     (int)$results[19];
			$age4559 =     (int)$results[20];
			$age60 =       (int)$results[21];
			$cauc =        (int)$results[22];
			$afAm =        (int)$results[23];
			$his =         (int)$results[24];
			$natAm =       (int)$results[25];
			$other =       (int)$results[26];
			$male =        (int)$results[27];
			$female =      (int)$results[28];

			/***************
			 * Update the results with the new survey submission
			 ***************/
			$answer = $_POST['Political-Party'];
			if ($answer == "Republican") {
				$republican++;
			} else if ($answer == "Democratic") {
				$democratic++;
			} else if ($answer == "Libertarian") {
				$libertarian++;
			} else if ($answer == "other") {
				$otherParty++;
			}

			$answer = $_POST['Direction'];
			if ($answer == "Right Direction") {
				$right++;
			} else if ($answer == "Wrong Direction") {
				$wrong++;
			} else if ($answer == "Undecided") {
				$undecided++;
			}

			$answer = $_POST['Candidate'];
			if ($answer == "Donald J Trump") {
				$trump++;
			} else if ($answer == "Hilary Clinton") {
				$hilary++;
			} else if ($answer == "Gary Johnson") {
				$gary++;
			} else if ($answer == "Evan McMullin") {
				$mucmullin++;
			} else if ($answer == "Other") {
				$otherVote++;
			} else if ($answer == "Won't Vote") {
				$wontVote++;
			} 

			$answer = $_POST['Watch-Debate'];
			if ($answer == "Yes") {
				$debateYes++;
			} else if ($answer == "No") {
				$debateNo++;
			}

			$answer = $_POST['Watch-Debate'];
			if ($answer == "Yes") {
				$changeYes++;
			} else if ($answer == "No") {
				$changeNo++;
			} else if ($answer == "Didn't Watch Debate") {
				$didNotWatch++;
			}

			$answer = $_POST['Age'];
			if ($answer == "18-29") {
				$age1829++;
			} else if ($answer == "30-44") {
				$age3044++;
			} else if ($answer == "45-59") {
				$age4559++;
			} else if ($answer == "60+") {
				$age60++;
			}

			$answer = $_POST['Race'];
			if ($answer == "Caucasian") {
				$cauc++;
			} else if ($answer == "African American") {
				$afAm++;
			} else if ($answer == "Hispanic/Latino") {
				$his++;
			} else if ($answer == "Native American") {
				$natAm++;
			} else if ($answer == "Other") {
				$other++;
			} 

			$answer = $_POST['Gender'];
			if ($answer == "Male") {
				$male++;
			} else if ($answer == "Female") {
				$female++;
			}

			// Put new results into a string variable
			$results = $republican."|".$democratic."|".$libertarian."|".$otherParty."|".$right."|".$wrong."|".$undecided."|".$trump."|".$hilary."|".$gary."|".$mucmullin."|".$otherVote."|".$wontVote."|".$debateYes."|".$debateNo."|".$changeYes."|".$changeNo."|".$didNotWatch."|".$age1829."|".$age3044."|".$age4559."|".$age60."|".$cauc."|".$afAm."|".$his."|".$natAm."|".$other."|".$male."|".$female;

			// add results to the text file
			file_put_contents($fileName, $results);

			setcookie("submitted", "yes");
			echo "set cookies";
			// display results
			header('Location: https://tranquil-garden-61392.herokuapp.com/surveyResults.php');
			exit(); // for security use exit function after redirect

		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hunter J Marshall</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/survey.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://hunterjmarshall.com/">Hunter J Marshall</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">WHAT</a>
						<ul class="dropdown-menu">
							<li><a href="http://hunterjmarshall.com/html/portfolio.html">Portfolio</a></li>
							<li><a href="http://hunterjmarshall.com/documents/HunterMarshallResume.pdf">Resume</a></li>
							<li><a href="http://hunterjmarshall.com/html/testimonials.html">Testimonials</a></li>
							<li><a href="http://hunterjmarshall.com/html/contactMe.html">Contact Me</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">WHO</a>
						<ul class="dropdown-menu">
							<li><a href="http://hunterjmarshall.com/html/hobbies.html">Hobbies</a></li>
							<li><a href="http://hunterjmarshall.com/html/pictures.html">Pictures</a></li>
							<li><a href="http://hunterjmarshall.com/html/blog.html">Blog</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- First Container -->
	<div class="container-fluid backgd">
		<div class="row">
			<div class="col-sm-12 text-center oldGloryRed">
				<h1>2016 Political Survey</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 errorMessage">
				<?php
					if(!empty($error)) {
						echo("<h3>There was an error with your survery submission:</h3>\n");
						echo("<ul>" . $error . "</ul>\n");
					}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 survey">
				<a href="surveyResults.php">View Results</a>
				<form method="post" id="survey" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<label>What Political Party do you associate yourself with?</label><br/>
						<input type="radio" name="Political-Party" id="republican" value="Republican"> Republican<br/>
						<input type="radio" name="Political-Party" id="democratic" value="Democratic"> Democratic<br/>
						<input type="radio" name="Political-Party" id="libertarian" value="Libertarian"> Libertarian<br/>
						<input type="radio" name="Political-Party" id="other" value="other"> Other<br/><br/>

					<label>Generally speaking, do you think this country is headed in the right direction or on the wrong track?</label><br/>
						<input type="radio" name="Direction" id="direction" value="Right Direction"> Right direction<br/>
						<input type="radio" name="Direction" id="direction" value="Wrong Direction"> Wrong direction<br/>
						<input type="radio" name="Direction" id="direction" value="Undecided"> Undecided<br/><br/>

					<label>If the election was held today, who would you vote for?</label><br/>
						<input type="radio" name="Candidate" id="candidate" value="Donald J Trump"> Donald J Trump (Republican Party)<br/>
						<input type="radio" name="Candidate" id="candidate" value="Hilary Clinton"> Hillary Clinton (Democratic Party)<br/>
						<input type="radio" name="Candidate" id="candidate" value="Gary Johnson"> Gary Johnson (Libertarian)<br/>
						<input type="radio" name="Candidate" id="candidate" value="Evan McMullin"> Evan McMullin (Independent)<br/>
						<input type="radio" name="Candidate" id="candidate" value="Other"> Other<br/>
						<input type="radio" name="Candidate" id="candidate" value="Won't Vote"> Won't Vote<br/><br/>

					<label>Did you watch the Presidential debates?</label><br/>
						<input type="radio" name="Watch-Debate" id="debate" value="Yes"> Yes<br/>
						<input type="radio" name="Watch-Debate" id="debate" value="No"> No<br/><br/>

					<label>If you watched the debate, did the debate change your mind on who you were voting for?</label><br/>
						<input type="radio" name="Changed-Vote" id="changeVote" value="Yes"> Yes<br/>
						<input type="radio" name="Changed-Vote" id="changeVote" value="No"> No<br/>
						<input type="radio" name="Changed-Vote" id="changeVote" value="Didn't Watch Debate"> Didn't watch debate<br/><br/>

					<label>What age group are you in?</label><br/>
						<input type="radio" name="Age" id="age" value="18-29"> 18-29<br/>
						<input type="radio" name="Age" id="age" value="30-44"> 30-44<br/>
						<input type="radio" name="Age" id="age" value="45-59"> 45-59<br/>
						<input type="radio" name="Age" id="age" value="60+"> 60+<br/><br/>

					<label>What racial heritage are you?</label><br/>
						<input type="radio" name="Race" id="race" value="Caucasian"> Caucasian<br/>
						<input type="radio" name="Race" id="race" value="African American"> African American<br/>
						<input type="radio" name="Race" id="race" value="Hispanic/Latino"> Hispanic/Latino<br/>
						<input type="radio" name="Race" id="race" value="Native American"> Native American<br/>
						<input type="radio" name="Race" id="race" value="Other"> Other<br/><br/>

					<label>Gender:</label><br/>
						<input type="radio" name="Gender" id="gender" value="Male"> Male<br/>
						<input type="radio" name="Gender" id="gender" value="Female"> Female<br/><br/>
						<input type="submit" name="submit" value="submitted">
				</form>
				<br/>
			</div>
			<div class="col-sm-12 text-center oldGloryRed">
				<h7>Thank you for your responses!</h7>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="footer-default">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-2">
				<ul style="list-style:none;">
					<li><h4 class="foot">What I Am</h4></li>
					<li><a href="http://hunterjmarshall.com/html/portfolio.html">Portfolio</a></li>
					<li><a href="http://hunterjmarshall.com/documents/HunterMarshallResume.pdf">Resume</a></li>
					<li><a href="http://hunterjmarshall.com/html/testimonials.html">Testimonials</a></li>
					<li><a href="http://hunterjmarshall.com/html/contactMe.html">Contact Me</a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<ul style="list-style:none;">
					<li><h4 class="foot">Who I Am</h4></li>
					<li><a href="http://hunterjmarshall.com/html/hobbies.html">Hobbies</a></li>
					<li><a href="http://hunterjmarshall.com/html/pictures.html">Pictures</a></li>
					<li><a href="http://hunterjmarshall.com/html/blog.html">Blog</a></li>
				</ul>
			</div>
			<div class="col-sm-2">
				<ul style="list-style:none;">
					<li><h4 class="foot">Contact Me</h4></li>
					<li>Rexburg, ID</li>
					<li>618.514.8390</li>
					<li>hjmarshall18@gmail.com</li>
					<li><a href="https://www.linkedin.com/in/hjmarshall18">My LinkedIn</a></li>
					<li><a href="https://github.com/hjcoder18">My Github</a></li>
				</ul>
			</div>
		</div>
		<p style="text-align:center; padding-top:20px;">Copyright &copy; 2016 Hunter Marshall - made by Hunter.</p>
	</footer>
</body>
</html>
