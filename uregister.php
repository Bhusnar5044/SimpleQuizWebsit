<?php
include "connection.php";

if (isset($_POST['submit']))  {
	$user=$_POST['email'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpassword'];
	// echo $user." ".$pass;

	$checkmail = "SELECT * from users WHERE user = '$user'";

	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));

	if (mysqli_num_rows($runcheck) > 0) {
				echo "<script> alert('User already Taken'); </script>";
	}

	else{

		if ($pass === $cpass) {

		$sql="INSERT INTO `users`(`user`, `password`) VALUES ('$user','$pass')";

		$run = mysqli_query($conn, $sql) or die(mysqli_error($conn)) ;
		
		if (mysqli_affected_rows($conn) > 0) {
		echo  "<script> alert('Succesfully Registered');</script>";
		header("Location: ulogin.php");
		}
	}
	else {
		echo  "<script> alert('wrong password');</script>";
	}
}
}
?>
<html>
	<head>
		<title>PHP-kuiz</title>
		
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
				<h2>Rwgister</h2>
				<form method="POST" action="">
				<label>Email</label>
				<input type="email" name="email" placeholder="Enter ur mail" required="" ><br>
				<label>Password</label>
				<input type="password" name="pass" placeholder="enter password" required="" ><br>
				
				<label>Confirm Password</label>
				<input type="password" name="cpassword" placeholder="enter password" required="" ><br>

				<input type="submit" name="submit" value="register">

			</div>


		</main>

		<footer>
			<div class="container fixed-bottom bg-dark">
				Copyright @ Bhsnar
			</div>
		</footer>

	</body>
</html>