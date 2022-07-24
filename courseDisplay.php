<?php include'header.php' ?>
<br>
<?php
if($_GET){
	$link=mysqli_connect("localhost","root","","course_academy");
	if(mysqli_connect_error()){
	  die("Unable to connect to database");
	}else{
	    $query="SELECT * FROM instructor,courses where instructor.ID=courses.i_id and courses.c_id=".$_GET["id"];
	    if($result=mysqli_query($link,$query)){
	    	$row=mysqli_fetch_array($result);
	    }
	}
}
?>
<div class="jumbotron" style="text-align: center;">
	<p style="font-size: 37px;font-weight: bold;margin-bottom: 8px;" id="title1"><?php echo $row["c_name"] ?></p>
	<p style="font-size: 16px;color: grey;"><a class="home" href="landing.php">Home</a>/<a class="home" href="courses.php">Courses</a>/<span id="title2"><?php echo $row["c_name"] ?></span></p>
	<p id="stars">
		<?php
			$num = floor($row["rating"]);
			$diff = $row["rating"]-$num;
			for($i=0;$i<$num;$i++){
				echo '<i class="fas fa-star" style="color: #ffb606"></i> ';
			}
			if($diff>=0.2 && $diff<0.7){
				echo '<i class="fas fa-star-half-alt" style="color: #ffb606"></i> ';
				$num++;
			}else if($diff>=0.7 && $diff<=0.9){
				echo '<i class="fas fa-star" style="color: #ffb606"></i> ';
				$num++;
			}
			for($i=$num;$i<5;$i++){
				echo '<i class="far fa-star" style="color: #ffb606"></i> ';
			}
		?>
	</p>
</div>
<div class="row">
	<div class="container">
		<div class="col-sm-8">
		<h2><b>Course Description</b></h2>
		<p style="color: #fe4a55;letter-spacing: 2px;">CREATED BY: <span id="author" style="text-transform: uppercase;"><?php echo $row["Name"] ?></span></p><br>
		<div class="row" style="background-color: #fbfbf8;border: 1px solid #dcdacb;border-radius: 4px;padding: 2.4rem 2.4rem;margin-right: 3%;margin-left: 0px;">
			<h3 style="padding-left: 14px;"><b>What you'll get</b></h3>
			<div class="col-xs-6">
				<p style="margin-top: 20px;"><i style="color: #fe4a55;" class="fas fa-check"></i> Full lifetime access</p>
				<p style="margin-top: 20px;"><i style="color: #fe4a55;" class="fas fa-check"></i> Access on mobile and TV</p>
			</div>
			<div class="col-xs-6">
				<p style="margin-top: 20px;"><i style="color: #fe4a55;" class="fas fa-check"></i> Assignments</p>
				<p style="margin-top: 20px;"><i style="color: #fe4a55;" class="fas fa-check"></i> Certificate of completion</p>
			</div>
		</div>
		<br><br>
		<p style="font-size: 16px;line-height: 25px;" id="desc"><?php echo $row["description"] ?></p><br><br>
		</div>
		<div class="col-sm-4" style="border: 10px solid #f8f9f8;background-color:#f8f9f8;padding: 0px;margin-bottom: 15px;">
			<img src="<?php echo $row['image'] ?>" id="imgs" style="width: 100%;">
			<div style="padding: 10px;">
				<h5 class="pull-right">Rs. <span id="price"><?php echo $row["price"] ?></span></h5>
				<h5><b><i class="fas fa-wallet" style="color: #fe4a55;"></i> Price</b></h5>
				<hr>
				<h5 class="pull-right" id="enroll"><?php echo number_format($row["enrollment"]) ?></h5>
				<h5><b><i class="fas fa-users" style="color: #fe4a55;"></i> Enrollment</b></h5>
				<hr>
				<h5 class="pull-right" id="cat" style="text-transform:uppercase;"><?php echo $row["category"] ?></h5>
				<h5><b><i class="fas fa-layer-group" style="color: #fe4a55;"></i> Category</b></h5>
				<hr>
				<?php
					if(isset($_SESSION['user_id'])){
	 					$q="SELECT * FROM buys where buys.u_id =".$_SESSION['user_id'];
						$flag=0;
					    if($res=mysqli_query($link,$q)){
					    	while ($r = $res->fetch_assoc()){
					    		if($r['c_id']==$_GET["id"]){
					    			include 'star.php';
					    			$flag=1;
					    			break;
					    		}
					    	}
					    }
						if($flag==0){
							echo '<a href="pay.php?cid='.$_GET["id"].'&uid='.$_SESSION['user_id'].'" class="btn btn-primary btn-block">Buy Now</a>';
						}
					}else if(isset($_SESSION['ins_id'])){
						echo '<a href="login.php?error=Please log in first" class="btn btn-primary btn-block disabled">Buy Now</a>';
					}else
						echo '<a href="login.php?error=Please log in first" class="btn btn-primary btn-block">Buy Now</a>';
				?>
			</div>
		</div>
	</div>
</div>
<?php include'footer.php' ?>
