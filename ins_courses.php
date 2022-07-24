<?php include'header.php' ?>
<br>
<div class="jumbotron" style="text-align: center;">
	<p style="font-size: 37px;font-weight: bold;margin-bottom: 8px;">My Courses</p>
	<p style="font-size: 16px;color: grey;"><a id="home" href="landing.php">Home</a>/My Courses</p>
</div>
<div class="container">
	<?php
		if(isset($_SESSION['ins_id'])){
			$link=mysqli_connect("localhost","root","","course_academy");
			if(mysqli_connect_error()){
			  die("Unable to connect to database");
			}else{
			    $query="SELECT * FROM instructor,courses where instructor.ID=courses.i_id and instructor.ID =".$_SESSION['ins_id'];
			    echo '<a href="courseCreate.php" style="display: table;margin:0 auto;font-size:20px;" class="btn btn-primary">Create A New Course!</a><br><br>';
			    if($result=mysqli_query($link,$query)){
			    	while ($row = $result->fetch_assoc()){
			    		echo '<div class="thumbnail">';
			    		echo '<div class="row" class="crep">';
			    	 	echo '<div class="col-md-4 col-xs-12">';
			    	 	echo '<img src="'.$row["image"].'" style="width: 98%; margin:1%;">';
			    	 	echo '</div>';
			    	 	echo '<div class="col-md-4 col-xs-12">';
			    	 	echo '<div style="padding:0px 15px;">';
			    	 	echo '<a href="courseDisplay.php?id='.$row["c_id"].'" id="chead"><h3><b>'.$row["c_name"].'</b></h3></a>';
			    	 	echo '<br>';
			   			echo '<a href="courseUpdate.php?id='.$row["c_id"].'" style="margin-right:10px;" class="btn btn-warning">Update</a>';
			   			echo '<a href="courseDelete.php?id='.$row["c_id"].'" class="btn btn-danger">Delete</a>';
			    	 	echo '</div>';
			    	 	echo '</div>';
			    	 	echo '<div class="col-md-4 col-xs-12">';
			    	 	echo '<h3 style="padding:0px 15px;color:#fe4a55;">Price: </h3>';
			    	 	echo '<p style="padding:0px 15px;"><b style="font-size: 20px;">Rs. '.$row["price"].'</b></p>';
			    		echo '<h3 style="padding:0px 15px;color:#fe4a55;">Profit Earned: </h3>';
			    	 	echo '<div style="padding:0px 15px;font-size: 20px;font-weight:bold;">Rs. '.number_format($row["enrollment"]*0.1);
			    	 	echo '</div>';
			    	 	echo '</div>';
			    	 	echo '</div>';
			    	 	echo '</div>';
					}
			    }
			}
		}
	?>
	<br>
</div>
<?php include'footer.php' ?>

