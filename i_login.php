<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if(isset($_SESSION["user_id"]) || isset($_SESSION["ins_id"])){
	    header("location:landing.php");
	    exit();
	}
?>
<br><br><br>
<?php
	if($_POST){
		$link = mysqli_connect("localhost","root","","course_academy");
		if(mysqli_connect_error()){
		  die("Unable to connect to database");
		}else{
		    $query = "SELECT * FROM instructor where Email='".$_POST["username"]."' and Password = '".$_POST["password"]."';";
		    if($result = mysqli_query($link,$query)){
		    	$row = mysqli_fetch_array($result);
		    	if($row){
		    		session_start();
		    		$_SESSION['ins_id']=$row["ID"];
		    		$newURL = "landing.php";
		    	}else{
		    		$newURL = "i_login.php?error=Invalid Username or Password";
			    }
			    header('Location: '.$newURL);
		    }
		}
	}
?>
<?php include'header.php' ?>
<div class="container" id="frm">
	<h1 style="text-align: center;font-weight: bold;">
		Instructor Login
	</h1>
	<br>
	<?php 
	  	if($_GET && $_GET["error"]){
	  		echo '<div class="alert alert-danger">';
	  		echo $_GET["error"];
	  		echo '</div>';
	  	}
	?>
	<form action="i_login.php" method="POST">
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
</div>
<?php include'footer.php' ?>
