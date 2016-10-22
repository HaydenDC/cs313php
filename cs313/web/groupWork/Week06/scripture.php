<?php

	$dbUrl = getenv('USERS_DB_URL');



	if (empty($dbUrl)) {

		// example localhost configuration URL with postgres username and a database called cs313db

		$dbUrl = "postgres://postgres:password@localhost:5432/cs313db";

	}



	$dbopts = parse_url($dbUrl);



	$dbHost = $dbopts["host"]; 

	$dbPort = $dbopts["port"]; 

	$dbUser = $dbopts["user"]; 

	$dbPassword = $dbopts["pass"];

	$dbName = ltrim($dbopts["path"],'/');



	try {

		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);



		if ($_SERVER['REQUEST_METHOD'] == "POST") 

		{

			$book = $chapter = $verse = $content = $topic = $newTopic = "";

			$bookErr = $chapterErr = $verseErr = $contentErr = $topicErr = "";

			$sql = 'INSERT INTO scripture (book, chapter, verse, content) VALUES () WHERE id=1';

			if(empty($_POST["book"])){

                $bookErr = "Book is required";

            }

            else{

                $book = $_POST["book"];

            }

            if(empty($_POST["chapter"])){

                $chapterErr = "Chapter is required";

            }

            else{

                $chapter = $_POST["chapter"];

            }

            if(empty($_POST["verse"])){

                $verseErr = "Verse is required";

            }

            else{

                $verse = $_POST["verse"];

            }

            if(empty($_POST["content"])){

                $contentErr = "Content is required";

            }

            else{

                $content = $_POST["content"];

            }



            if(!empty($_POST['topics'])){

                $topics = $_POST["topics"];

                        if(in_array("0", $topics)){

                            if($_POST["Other"] != ""){

                                $newTopic = $_POST["Other"];

                            }

                            else{

                                $topicErr = "Please provide a topic next to the selected checkbox";

                            }

                        }

            }

            else{

                $topicErr = "Please select a topic";

            }

            if($bookErr == "" && $chapterErr == "" && $verseErr == "" && $contentErr == "" && $topicErr == "")

            {

            	$db->exec("INSERT INTO scriptures (book, chapter, verse, content) VALUES ('$book', '$chapter', '$verse', '$content')");

            	 $sid = $db->lastInsertId('scriptures_id_seq');



                if($newTopic != ""){

                    $db->exec("INSERT INTO topic (name) VALUES ('$newTopic')");

                    $topicId = $db->lastInsertId('topics_id_seq');

                    $db->exec("INSERT INTO scripTopicLink (scriptures_id, topic_id) VALUES ('$sid', '$topicId')");

                }

                for($i = 0; $i < count($topics); $i++){

                    $db->exec("INSERT INTO scripTopicLink (scriptures_id, topic_id) VALUES ('$sid', '" . $topics["$i"] . "')");

                }

                $book = $chapter = $verse = $content = $topic = $newTopic = "";

                $bookErr = $chapterErr = $verseErr = $contentErr = $topicErr = "";

            }

		}



		foreach($db->query('SELECT book, chapter, verse, content FROM scripture') as $row)

		{

			$work2 = $row['book'];

			$financial_aid2 = $row['chapter'];

			$scholarships2 = $row['verse'];

			$income_other2 = $row['content'];

		}



	}

	catch (PDOException $ex) {

		print "<p>error: $ex->getMessage() </p>\n\n";

		die();

	}

?>

<!DOCTYPE html>

<html lang="en">

<head>

	<title>My Favorite Scriptures</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="stylesheets/survey.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

	<form method="post" id="budget" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

		<label>Book</label><span><?= $bookErr;?></span><br>

		<input type="text" name="book" value="<?=$book?>"><br><br>

		<label>Chapter</label><span><?= $chapterErr;?></span><br>

		<input type="text" name="chapter" value="<?=$chapter?>"><br><br>

		<label>Verse</label><span><?= $verseErr;?></span><br>

		<input type="text" name="verse" value="<?=$verse?>"><br><br>

		<label>Content</label><span><?= $contentErr;?></span><br>

		<textarea cols="30" rows="4" name="content"><?=$content?></textarea>

		<br/><br/>

		<?php 

          foreach($db->query('SELECT * FROM topic')->fetchAll() as $topic) 

          {

           	echo "<input type='checkbox' name='topics[]' value='" . $topic['id'] . "'>" . $topic['name'] . "<br>";

          }



        ?>

        <input type="checkbox" name="topics[]" value="0"><input type="text" name="Other" onfocus="$(this).prev(':checkbox').prop('checked', 'checked');" /><br>

        <br><br>

        <input type="hidden" name="form" value="form1" />

        <input type="submit" value="Submit">

        <br><br>

        <?

        foreach($db->query('SELECT DISTINCT book FROM scriptures')->fetchAll() as $books) 

        {

        	if ($_SERVER['REQUEST_METHOD'] == "POST") {

        		 $selected = "selected='selected'";

            }

            else{

               $selected = "";

            }

            echo '<option value="' . $books['book'] . '"' . $selected . '>' . $books['book'] . '</option>';

        }



        ?>

	</form>

</body>

</html>