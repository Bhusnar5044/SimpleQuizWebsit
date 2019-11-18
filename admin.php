<?php
session_start();
include "connection.php";
if (isset($_SESSION['user'])) {
	header("location: adminhome.php");
}
if (isset($_POST['submit']))  {
	$user=$_POST['email'];

	$checkmail = "SELECT user,password from users WHERE user = '$user'";

	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));

	if (mysqli_num_rows($runcheck) > 0) {
			$row = mysqli_fetch_array($runcheck);
			session_start();
			$_SESSION['user']=True;
			$_SESSION['email'] = $row['email'];
			$pass1=$row['password'];

			if($pass===$pass1){
	if (password_verify($password , $adminpass)) {
		$_SESSION['user'] = "true";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('wrong password');</script>";
	}
}


?>



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
			      <a class="nav-link" href="uregister.php">Register</a>
			    </li>
			  </ul>
			</nav>
		</header>

		<main>
		<div class="container" style="margin-top: 100px">
				<h2>Enter Password</h2>
				<form method="POST" action="">
				<input type="password" name="password" required="" >
				<input type="submit" name="submit" value="send"> 

			</div>


		</main>

		<footer>
			<div class="container fixed-bottom bg-dark">
				Copyright @ Bhsnar
			</div>
		</footer>

	</body>
</html>