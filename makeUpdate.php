<?php
	if($_POST){
		$link = mysqli_connect("localhost","root","","course_academy",8111);
		if(mysqli_connect_error()){
		  die("Unable to connect to database");
		}else{
			if(isset($_SESSION)==FALSE){
				session_start();
			}
			$query='UPDATE courses SET c_name="'.$_POST["cname"].'", price="'.$_POST["price"].'", description="'.$_POST["desc"].'", image="'.$_POST["img"].'", original="'.$_POST["original"].'",category="'.$_POST["category"].'" where c_id='.$_POST["id"].';';
		  	// echo $query;
		    if($result = mysqli_query($link,$query)){
	    		$newURL = "courseDisplay.php?id=".$_POST["id"];
	    	}else{
	    		$newURL = "courseUpdate.php?error=Internal Server Error";
		    }
		    header('Location: '.$newURL);
		}
	}
?>