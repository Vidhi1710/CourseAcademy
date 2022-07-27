<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if(isset($_SESSION["user_id"]) || isset($_SESSION["ins_id"])){
	    header("location:landing.php");
	    exit();
	}
?>

<?php
	if($_POST){
		$link = mysqli_connect("localhost","root","","course_academy");
		if(mysqli_connect_error()){
		  die("Unable to connect to database");
		}else{
		    $query = "SELECT * FROM user where u_email='".$_POST["username"]."' and u_password = '".$_POST["password"]."';";
		    if($result = mysqli_query($link,$query)){
		    	$row = mysqli_fetch_array($result);
		    	if($row){
		    		session_start();
		    		$_SESSION['user_id']=$row["u_id"];
		    		$newURL = "landing.php";
		    	}else{
		    		$newURL = "login.php?error=Invalid Username or Password";
			    }
			    header('Location: '.$newURL);
		    }
		}
	}
?>
<?php include'header.php' ?>
<div class="container" id="frm">
	<h1 style="text-align: center;font-weight: bold;">
		Login
	</h1>
	<br>
	<?php 
	  	if($_GET && $_GET["error"]){
	  		echo '<div class="alert alert-danger">';
	  		echo $_GET["error"];
	  		echo '</div>';
	  	}
	?>
	<form action="login.php" method="POST">
		<b>EMAIL</b>
		<div class="form-group">
			<input type="text" name="username" id="username" placeholder="Email" class="form-control" required>
		</div>
		<b>PASSWORD</b>
		<div class="form-group">
			<input type="password" name="password" id="password" placeholder="Password" class="form-control" required>	
		</div>
		<br>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg">LOGIN</button>
		</div>
	</form>
	<h3 style="text-align:center;">
		OR
	</h3>
	<div class="form-group">
		<a href="signup.php" class="btn btn-default btn-block btn-lg">SIGN UP</a>
	</div>
</div>
<?php include'footer.php' ?>
