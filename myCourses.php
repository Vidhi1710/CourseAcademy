<?php include'header.php' ?>
<br>
<div class="jumbotron" style="text-align: center;">
	<p style="font-size: 37px;font-weight: bold;margin-bottom: 8px;">My Courses</p>
	<p style="font-size: 16px;color: grey;"><a id="home" href="landing.php">Home</a>/My Courses</p>
</div>
<div class="container">
	<div class="row" id="rep">
		<?php
			if(isset($_SESSION['user_id'])){
				$link=mysqli_connect("localhost","root","","course_academy",8111);
				if(mysqli_connect_error()){
				  die("Unable to connect to database");
				}else{
				    $query="SELECT * FROM instructor,courses,buys where instructor.ID=courses.i_id and buys.c_id=courses
				    .c_id and buys.u_id =".$_SESSION['user_id'];
				    if($result=mysqli_query($link,$query)){
				    	while ($row = $result->fetch_assoc()){
				    	 	echo '<div class="col-lg-4 col-sm-6 col-xs-12">';
				    	 	echo '<div class="thumbnail">';
				    	 	echo '<img src="'.$row["image"].'" style="width: 100%;">';
				    	 	echo '<div style="padding:15px;">';
				    	 	echo '<a href="courseDisplay.php?id='.$row["c_id"].'" id="chead"><h3><b>'.$row["c_name"].'</b></h3></a>';
				    	 	echo '<p style="color: #fe4a55;font-size: 16px;">'.$row["Name"].'</p>';
				    	 	echo '<p style="text-transform: uppercase;color: #bcbcbc;">'.$row["category"].'</p>';
				    	 	echo '<p style="margin-bottom: 0px;"><b style="font-size: 20px;">Rs. '.$row["price"].' <s style="color: grey;">Rs. '.$row["original"].'</s>'.'</b></p>';
				    	 	$disc=ceil((1-($row["price"]/$row["original"]))*100);
				    	 	echo '<p style="color: grey;font-size: 15px;"><b>Discount: </b>'.$disc.'%</p>';
				    	 	echo '<div style="font-size: 16px;"><span class="pull-right"><i class="fas fa-user-friends"></i> '.number_format($row["enrollment"]).'</span>';
				    	 	echo '<i class="fas fa-star"></i> ';
				    	 	if($row['rating']!=0)
				    	 		echo "You rated: ".$row['rating'];
				    	 	else
				    	 		echo "You have not rated it yet";
				    	 	echo '</div>';
				    	 	echo '</div>';
				    	 	echo '</div>';
				    	 	echo '</div>';
						}
				    }
				}
			}
		?>
	</div>
	<br>
</div>
<?php include'footer.php' ?>

