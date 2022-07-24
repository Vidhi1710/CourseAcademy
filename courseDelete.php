<?php
	if($_GET){
		$link = mysqli_connect("localhost","root","","course_academy",8111);
		if(mysqli_connect_error()){
		  die("Unable to connect to database");
		}else{
			if(isset($_SESSION)==FALSE){
				session_start();
			}
			$query='DELETE FROM courses where c_id="'.$_GET["id"].'";';
		  	echo $query;
		    if($result = mysqli_query($link,$query)){
	    		$newURL = "courses.php";
	    	}else{
	    		$newURL = "ins_courses.php";
		    }
		    header('Location: '.$newURL);
		}
	}
?>