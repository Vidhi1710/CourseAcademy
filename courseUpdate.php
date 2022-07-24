<?php include'header.php' ?>
<div class="container" id="frm">
	<h1 style="text-align: center;font-weight: bold;">
		Update Course
	</h1>
	<br>
	<?php 
	  	if($_GET && isset($_GET["error"])){
	  		echo '<div class="alert alert-danger">';
	  		echo $_GET["error"];
	  		echo '</div>';
	  	}
	?>
	<?php
		if($_GET && isset($_GET["id"])){
			$link=mysqli_connect("localhost","root","","course_academy");
			if(mysqli_connect_error()){
			  die("Unable to connect to database");
			}else{
			    $query="SELECT * FROM courses where courses.c_id=".$_GET["id"];
			    if($result=mysqli_query($link,$query)){
			    	$row=mysqli_fetch_array($result);
			    }
			}
		}
	?>
	<form action="makeUpdate.php" method="POST">
		<?php echo '<input type="hidden" name="id" value="'.$_GET["id"].'">' ?>
		<b>COURSE NAME</b>
		<div class="form-group">
			<?php
				echo '<input type="text" name="cname" placeholder="Course Name" class="form-control" required value="'.$row["c_name"].'">'
			?>
		</div>
		<b>IMAGE</b>
		<div class="form-group">
			<?php
				echo '<input type="text" name="img" placeholder="Image Link" class="form-control" required value="'.$row["image"].'">';
			?>
		</div>
		<b>DESCRIPTION</b>
		<div class="form-group">
			<?php
				echo '<textarea name="desc" placeholder="Describe Your Course" class="form-control" required rows="10">'.$row["description"].'</textarea>';
			?>
		</div>
		<b>ORIGINAL PRICE</b>
		<div class="form-group">
			<?php
				echo '<input type="text" name="original" placeholder="Original Price" class="form-control" required value='.$row["original"].'>';
			?>
		</div>
		<b>DISCOUNTED PRICE</b>
		<div class="form-group">
			<?php
				echo '<input type="text" name="price" placeholder="Price Of Course" class="form-control" required value='.$row["price"].'>';
			?>
		</div>
		<b>CATEGORY</b>
		<div class="form-group">
			<?php
				echo '<input type="text" name="category" placeholder="Category" class="form-control" required value='.$row["category"].'>';
			?>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">UPDATE</button>
		</div>
	</form>
</div>
<?php include'footer.php' ?>
