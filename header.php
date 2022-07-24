<!DOCTYPE html>
<html>
<head>
	<title>Course Academy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Eo_circle_red_letter-c.svg/2048px-Eo_circle_red_letter-c.svg.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="stylesheets/courseDisplay.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/landing.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/courses.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/login.css">
</head>
<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        			<span class="sr-only">Toggle navigation</span>
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
	      			</button>
					<a href="landing.php" class="navbar-brand" style="font-size: 21px;">Course Academy</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<?php
							if(!isset($_SESSION)){
								session_start();
							}
							// session_start();
							if(isset($_SESSION['user_id'])){
								$link = mysqli_connect("localhost","root","","course_academy");
								if(mysqli_connect_error()){
								  die("Unable to connect to database");
								}else{
								    $query = "SELECT u_name FROM user where u_id='".$_SESSION['user_id']."';";
								    if($result = mysqli_query($link,$query)){
								    	$row = mysqli_fetch_array($result);
								    	echo '<li><a href="#" class="c1">Hello, '.$row["u_name"].'</a></li>';
								    }
								}
								echo '<li><a href="courses.php">Courses</a></li>';
								echo '<li><a href="myCourses.php" class="c1">My Courses</a></li>';
								echo '<li><a href="logout.php" class="c1">Logout</a></li>';
							}else if(isset($_SESSION['ins_id'])){
								$link = mysqli_connect("localhost","root","","course_academy");
								if(mysqli_connect_error()){
								  die("Unable to connect to database");
								}else{
								    $query = "SELECT Name FROM instructor where Id='".$_SESSION['ins_id']."';";
								    if($result = mysqli_query($link,$query)){
								    	$row = mysqli_fetch_array($result);
								    	echo '<li><a href="#" class="c1">Hello, '.$row["Name"].'</a></li>';
								    }
								}
								echo '<li><a href="courses.php">Courses</a></li>';
								echo '<li><a href="ins_courses.php" class="c1">My Courses</a></li>';
								echo '<li><a href="logout.php" class="c1">Logout</a></li>';
							}else{
								echo '<li><a href="courses.php">Courses</a></li>';
								echo '<li><a href="i_login.php">Instructor</a></li>';
								echo '<li><a href="login.php" class="c1">Login</a></li>';
								echo '<li><a href="signup.php" class="c1">Signup</a></li>';
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
