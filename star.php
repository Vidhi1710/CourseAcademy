<?php 
	if(isset($_POST["rating"])){
		$l=mysqli_connect("localhost","root","","course_academy",8111);
		if(mysqli_connect_error()){
		  	die("Unable to connect to database");
		}else{
			$q="UPDATE buys SET rating='".$_POST["rating"]."' where u_id ='".$_SESSION['user_id']."' and c_id = '".$_GET['id']."';";
			if(mysqli_query($l,$q)){
				$sub1="SELECT rating from courses WHERE c_id='".$_GET['id']."';";
				if($sub_res=mysqli_query($l,$sub1)){
			    	$row=mysqli_fetch_array($sub_res);
			    	$old_rating=$row["rating"];
			    }
			    $new_rating=($old_rating+$_POST["rating"])/2;
			    $new_rating=round($new_rating,1);
				$sub2="UPDATE courses SET rating='".$new_rating."' WHERE c_id='".$_GET['id']."';";
				mysqli_query($l,$sub2);
			}
		}
	}
?>
<style type="text/css">
	.rating {
		display: flex;
		flex-direction: row-reverse;
		justify-content: center;
	}

	.rating > input{
	 	display:none;
	}

	.rating > label {
		font-size: 30px;
		position: relative;
		color: #FFD700;
		cursor: pointer;
	}

	.rating > label::before{
		content: "\2605";
		position: absolute;
		opacity: 0;
	}

	.rating > label:hover:before,
	.rating > label:hover ~ label:before {
		opacity: 1 !important;
	}

	.rating > input:checked ~ label:before{
		opacity:1;
	}

	.rating:hover > input:checked ~ label:before{ 
		opacity: 0.4;
	}
</style>

<form method="post">
	<div class="rating">
		<?php
			$link=mysqli_connect("localhost","root","","course_academy",8111);
			if(mysqli_connect_error()){
			  die("Unable to connect to database");
			}else{
				$query="SELECT rating FROM buys where u_id ='".$_SESSION['user_id']."'and c_id = '".$_GET['id']."';";
				if($result=mysqli_query($link,$query)){
					$row=mysqli_fetch_array($result);
					$rate=$row["rating"];
				}
			}
			for($x=5;$x>=1;$x--){
				if($x==$rate){
					echo '<input type="radio" name="rating" value="'.$x.'" id="'.$x.'" checked><label for="'.$x.'">☆</label>';
				}else
					echo '<input type="radio" name="rating" value="'.$x.'" id="'.$x.'"><label for="'.$x.'">☆</label>';
			}
		?>
	</div>
	<button type="submit" class="btn btn-primary btn-block">Rate</button>
</form>