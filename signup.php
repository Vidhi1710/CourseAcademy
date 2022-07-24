<?php
	if(isset($_SESSION['user_id'])){
		header('Location: landing.php');
		exit;
	}
?>

<?php
	if($_POST){
		$error="";
		if (empty($_POST["username"])) {
			$error = "Email is required";
		}else {
			$email = $_POST["username"];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = "Invalid Email Format";
			}
		}
		if($error!="")
			header('Location: signup.php?error='.$error);

		if (empty($_POST["fullname"])) {
			$error = "Name is required";
 		}else {
	    	$name = $_POST["fullname"];
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		      $error = "Only letters and white space allowed in name";
		    }
		}
		if($error!="")
			header('Location: signup.php?error='.$error);

		if (empty($_POST["password"])) {
			$error = "Password is required";
		}else{
			$password = $_POST["password"];
		}

		if($error!="")
			header('Location: signup.php?error='.$error);


		//All checkes passed
		$link = mysqli_connect("localhost","root","","course_academy",8111);
		if(mysqli_connect_error()){
		  die("Unable to connect to database");
		}else{
		    $query = "SELECT * FROM user where u_email='".$email."';";
		    if($result = mysqli_query($link,$query)){
		    	$row = mysqli_fetch_array($result);
		    	if($row){
		    		$newURL = "signup.php?error=Username already exists!";
		    	}else{
		    		$query="INSERT INTO `user`(`u_name`, `u_email`, `u_password`) VALUES ('".$name."','".$email."','".$password."')";
		    		if($result = mysqli_query($link,$query)){
		    			session_start();
		    			$query="SELECT u_id from user where u_email='".$email."';";
		    			if($res=mysqli_query($link,$query)){
		    				$ans=mysqli_fetch_array($res);
		    				$_SESSION['user_id']=$ans["u_id"];
		    			}
		    			$newURL = "landing.php";
		    		}else{
		    			$newURL = "signup.php?error=Internal server error";
					}
			    }
			    header('Location: '.$newURL);
		    }
		}
	}
?>

<?php include'header.php' ?>
<script type="text/javascript">
	function validateForm() {
		let x = document.forms["myForm"]["username"].value.trim();
		let y = document.forms["myForm"]["fullname"].value.trim();
		let z = document.forms["myForm"]["password"].value.trim();
		if (x == "") {
			alert("Email must be filled out");
    		return false;
		}
		if(y==""){
			alert("Name must be filled out");
    		return false;
		}
		if(z==""){
			alert("Password must be filled out");
    		return false;
		}
	}
</script>

<div class="container" id="frm">
	<h1 style="text-align: center;font-weight: bold;">
		Sign Up
	</h1>
	<br>
	<?php 
	  	if($_GET && $_GET["error"]){
	  		echo '<div class="alert alert-danger">';
	  		echo $_GET["error"];
	  		echo '</div>';
	  	}
	?>
	<form name="myForm" onsubmit="return validateForm()" action="signup.php" method="post">
		<b>EMAIL</b>
		<div class="form-group">
			<input type="text" name="username" id="username" placeholder="Email" class="form-control" required>
		</div>
		<b>FULL NAME</b>
		<div class="form-group">
			<input type="text" name="fullname" id="fullname" placeholder="Fullname" class="form-control" required>
		</div>
		<b>PASSWORD</b>
		<div class="form-group">
			<input type="password" name="password" id="password" placeholder="Password" class="form-control" required>	
		</div>
		<br>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg">SIGNUP</button>
		</div>
	</form>
		<h3 style="text-align:center;">
		OR
	</h3>
	<div class="form-group">
		<a href="login.php" class="btn btn-default btn-block btn-lg">LOGIN</a>
	</div>
</div>
<?php include'footer.php' ?>