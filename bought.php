<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if(!isset($_SESSION["user_id"])){
	    header("location:landing.php");
	    exit();
	}
?>
<?php include'header.php' ?>
<?php 
	$link = mysqli_connect("localhost","root","","course_academy");
	if(mysqli_connect_error()){
	  die("Unable to connect to database");
	}else{
	    $query = "INSERT INTO `buys`(`u_id`, `c_id`) VALUES ('".$_GET["uid"]."','".$_GET["cid"]."')";
	    $result = mysqli_query($link,$query);
	    if($result==false){
		    header('Location: landing.php');
	    }
	    $q1="SELECT enrollment from courses WHERE c_id='".$_GET["cid"]."'";
	    $res1=mysqli_query($link,$q1);
	    $r1=mysqli_fetch_array($res1);
	    $enr=$r1["enrollment"];
	    $enr=$enr+1;
	    $q2= "UPDATE courses SET enrollment='".$enr."' WHERE c_id='".$_GET["cid"]."'";
	    $res2=mysqli_query($link,$q2);
	    if($res2==false){
		    header('Location: landing.php');
	    }
	}
?>
<br><br><br>
<div class="container" style="text-align: center;">
	<p style="margin: 50px;"><i class="fas fa-check-circle" style="font-size: 101px;color: #fe4a55;"></i></p>
	<h1 style="font-family: 'Montserrat', sans-serif;color: #fe4a55;"><b>Congratulations! You have successfully been enrolled!</b></h1>
	<h3 style="padding: 11px;">Your course will start downloading shortly!</h3>
	<h4 style="color: grey;">In case of any query contact us at given details.</h4>
	<br><br>
</div>
<?php include'footer.php' ?>
