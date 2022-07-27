<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if(!isset($_SESSION["ins_id"])){
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
			if(isset($_SESSION)==FALSE){
				session_start();
			}
			$six_digit_random_number = random_int(100000, 999999);
		    $query = "INSERT INTO `courses`(`c_name`, `price`, `enrollment`, `description`, `image`, `original`, `i_id`, `category`) VALUES ('".$_POST["cname"]."','".$_POST["price"]."','".$six_digit_random_number."','".$_POST["desc"]."','".$_POST["img"]."','".$_POST["original"]."','".$_SESSION['ins_id']."','".$_POST["category"]."');";
		  	// echo $query;
		    if($result = mysqli_query($link,$query)){
	    		$newURL = "courses.php";
	    	}else{
	    		$newURL = "courseCreate.php?error=Internal Server Error";
		    }
		    header('Location: '.$newURL);
		}
	}
?>
<?php include'header.php' ?>
<div class="container" id="frm">
	<h1 style="text-align: center;font-weight: bold;">
		Create A Course
	</h1>
	<br>
	<?php 
	  	if($_GET && isset($_GET["error"])){
	  		echo '<div class="alert alert-danger">';
	  		echo $_GET["error"];
	  		echo '</div>';
	  	}
	?>
	<form action="courseCreate.php" method="POST">
		<b>COURSE NAME</b>
		<div class="form-group">
			<input type="text" name="cname" placeholder="Course Name" class="form-control" required>
		</div>
		<b>IMAGE</b>
		<div class="form-group">
			<input type="text" name="img" placeholder="Image Link" class="form-control" required>
		</div>
		<b>DESCRIPTION</b>
		<div class="form-group">
			<textarea name="desc" placeholder="Describe Your Course" class="form-control" required rows="10"></textarea>
		</div>
		<b>ORIGINAL PRICE</b>
		<div class="form-group">
			<input type="text" name="original" placeholder="Original Price" class="form-control" required>
		</div>
		<b>DISCOUNTED PRICE</b>
		<div class="form-group">
			<input type="text" name="price" placeholder="Price Of Course" class="form-control" required>
		</div>
		<b>CATEGORY</b>
		<div class="form-group">
			<input type="text" name="category" placeholder="Category" class="form-control" required>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
		</div>
	</form>
</div>
<?php include'footer.php' ?>
