<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);


    $checkqsn = "SELECT * FROM questions";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO questions(qno, question , ans1, ans2, ans3, ans4, correct_answer) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully added'); </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>QuizApp</title>
		
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		  <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<nav class="navbar navbar-expand-sm bg-dark fixed-top">
			  <ul class="navbar-nav">
			    <li class="nav-item">
			      <a class="nav-link" href="index.php">Home</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="admin.php">Admin Panel</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="ulogin.php">Login</a>
			    </li>

			   <li class="nav-item">
			      <a class="nav-link" href="ulogin.php">Register</a>
			    </li>
			  </ul>
			</nav>

			<div class="container">
				<h1>PHP-Kuiz</h1>
				<a href="index.php" class="start">Home</a>
				<a href="add.php" class="start">Add Question</a>
				<a href="allquestions.php" class="start">All Questions</a>
				<a href="players.php" class="start">Players</a>
				<a href="exit.php" class="start">Logout</a>
				
			</div>
		</header>

		<main style="margin-top: 100px">
			<div class="container">
				<h2>Add a question...</h2>
				<form method="post" action="">

					<p>
						<label>Question</label>
						<input type="text" name="question" required="">
					</p>
					<p>
						<label>Choice #1</label>
						<input type="text" name="choice1" required="">
					</p>
					<p>
						<label>Choice #2</label>
						<input type="text" name="choice2" required="">
					</p>
					<p>
						<label>Choice #3</label>
						<input type="text" name="choice3" required="">
					</p>
					<p>
						<label>Choice #4</label>
						<input type="text" name="choice4" required="">
					</p>
					<p>
						<label>Correct answer</label>
						<select name="answer">
                        <option value="a">Choice #1 </option>
                        <option value="b">Choice #2</option>
                        <option value="c">Choice #3</option>
                        <option value="d">Choice #4</option>
                    </select>
					</p>
					<p>
						
						<input type="submit" name="submit" value="Submit">
					</p>
				</form>
			</div>
		</main>

		

	</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>