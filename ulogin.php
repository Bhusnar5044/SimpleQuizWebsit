<?php

include "connection.php";

if (isset($_POST['submit'])) {
	
	$user=$_POST['email'];
	$pass=$_POST['password'];


	$checkmail = "SELECT user,password from users WHERE user = '$user'";

	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));

	if (mysqli_num_rows($runcheck) > 0) {
			$row = mysqli_fetch_array($runcheck);
			session_start();
			$_SESSION['user']=True;
			$_SESSION['email'] = $row['email'];
			$pass1=$row['password'];

			if($pass===$pass1){

				header("location: question.php");
			}
			else{
				echo "<script> alert('password did not match'); </script>";
			}
		}

	else{
		echo "<script> alert('please try again'); </script>";
	}

}

?>
<html>
	<head>
		<title>QuizApi</title>
		
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
			<br>
			<!-- <div class="container">
				<h1>PHP-kuiz</h1>
				<a href="index.php" class="start">Home</a>
				<a href="admin.php" class="start">Admin Panel</a>

			</div> -->
		</header>

		<main>
		<div class="container" style="margin-top:100px ">
				<h2>Login</h2>
				<form method="POST" action="">
				<label>Email</label>
				<input type="email" name="email" placeholder="Enter ur mail" required="" ><br>
				<label>Password</label>
				<input type="password" name="password" placeholder="enter password" required="" ><br>

				<input type="submit" name="submit" value="Login">

			</div>


		</main>

		<footer>
			<div class="container fixed-bottom bg-dark">
				Copyright @ Bhsnar
			</div>
		</footer>

	</body>
</html>