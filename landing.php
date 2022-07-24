<?php include'header.php' ?>
<div style="background-color: black;">
	<img src="https://my.uiw.edu/current-students/_imgs/uiw-students-learning-remotely-hero.jpg" id="mainImg">
</div>
<div id="heading"><div style="font-size: 13px;margin-bottom: 12px;">GREETINGS FROM COURSE ACADEMY</div>Bringing you a <b>positive</b> and <b>awakening perspective</b> towards your <span id="text"></span><br>
	<a href="courses.html" class="btn btn-primary" style="font-size: 16px;padding: 10px 35px;margin-top: 30px;"><i class="fa fa-user" aria-hidden="true"></i> Start Now</a>
</div><!-- <br><br> -->
<div class="start">
	<span style="color: #fe4a55;letter-spacing: 2px;">EDUCATION FOR EVERYONE</span><br>
	<p class="dratt">Affordable Online Courses and Learning Opportunities​</p>
	<div class="drat">Finding your own space and utilize better learning options can result in faster than the traditional ways. Enjoy the beauty of eLearning!</div>
</div>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-sm-6 part" style="background-image: url('images/blue.PNG');background-repeat: no-repeat;background-size: cover;">
			<h3 style="font-weight: bold;"><i class="fas fa-brain" style="font-size: 35px;color: black;"></i><br><br>Learn the Latest Top Skills</h3>
			<br><p style="font-size: 16px;">Learning top skills can bring an extra-ordinary outcome in a career.</p>
			<a href="courses.html" class="btn btn-primary">Start Now</a>
		</div>
		<div class="col-lg-3 col-sm-6 part" style="background-image: url('images/orange.PNG');background-repeat: no-repeat;background-size: cover;">
			<h3 style="font-weight: bold;"><i class="fa fa-desktop" aria-hidden="true" style="font-size: 35px;"></i><br><br>Learn in Your Own Pace</h3>
			<br><p style="font-size: 16px;">Everyone prefers to enjoy learning at their own pace & that gives a great result.</p>
			<a href="courses.html" class="btn btn-primary">Start Now</a>
		</div>
		<div class="col-lg-3 col-sm-6 part" style="background-image: url('images/green.PNG');background-repeat: no-repeat;background-size: cover;">
			<h3 style="font-weight: bold;"><i class="fas fa-shield-alt" style="font-size: 35px;color: black;"></i><br><br>Learn From Industry Experts</h3>
			<br><p style="font-size: 16px;">Experienced teachers can assist in learning faster with their best approaches!</p>
			<a href="courses.html" class="btn btn-primary">Start Now</a>
		</div>
		<div class="col-lg-3 col-sm-6 part" style="background-image: url('images/yellow.PNG');background-repeat: no-repeat;background-size: cover;">
			<h3 style="font-weight: bold;"><i class="fas fa-globe-americas" style="font-size: 35px;color: black;"></i><br><br>Enjoy Learning From Anywhere</h3>
			<br><p style="font-size: 16px;">We are delighted to give you options to enjoy learning from anywhere in the world.</p>
			<a href="courses.html" class="btn btn-primary">Start Now</a>
		</div>
	</div>
</div>
<br><br><br><br>
<div>
	<img src="images/try.jpg" id="data">
	<div class="row" id="imgData">
		<div class="col-sm-4">
			<b>100000+ <br><span style="color:#fe4a55;">ENROLLED LEARNERS</b></span>
		</div>
		<div class="col-sm-4">
			<b><?php 
				$link=mysqli_connect("localhost","root","","course_academy",8111);
				if(mysqli_connect_error()){
				  die("Unable to connect to database");
				}else{
				    $query="SELECT COUNT(*) as count FROM courses;";
				    if($result=mysqli_query($link,$query)){
				    	$row=mysqli_fetch_array($result);
				    	echo $row["count"];
				    }
				}
			?>
			<br><span style="color:#fe4a55;">ONLINE COURSES</b></span>
		</div>
		<div class="col-sm-3">
			<b>100% <br><span style="color:#fe4a55;">SATISFACTION</b></span>
		</div>
	</div>
</div>
<div id="under" class="row">
	<div class="container">
		<div class="col-lg-3 col-sm-6 col-xs-6">
			<img src="images/img1.png" style="width: 100%;">
			<img src="images/img3.png" style="width: 100%;">
		</div>
		<div class="col-lg-3 col-sm-6 col-xs-6">
			<img src="images/img2.png" style="width: 100%;">
			<img src="images/img4.png" style="width: 100%;margin-top: 20px;">
		</div>
		<div class="col-lg-6 col-sm-12 col-xs-12">
			<br><br>
			<p style="color:#fe4a55;letter-spacing:3px;">ONLINE LEARNING</p>
			<h1 style="font-weight: bold;">Develop Your Skills, Learn Something New, and Grow Your Skills From Anywhere in the World at Anytime!</h1>
			<p style="font-size: 16px;letter-spacing: 1px;color: #868686;">We understand better that online-based learning can make a significant change to reach students from all over the world! Giving options to learn better always can offer the best outcomes!</p>
			<div class="row" style="font-size: 20px;font-weight: bold;padding-top: 3%;"><div class="col-sm-6"><i class="fas fa-chalkboard-teacher" style="color: #fe4a55;"></i> Expert instructors</div>
				<div class="col-sm-6"><i class="fas fa-tv" style="color: #fe4a55;"></i> Access on mobile and TV</div>
				<div class="col-sm-6">
				<i class="fas fa-trophy" style="color: #fe4a55;"></i> Affordable Certification</div>
				<div class="col-sm-6">
				<i class="fas fa-infinity" style="color: #fe4a55;"></i> Lifetime Access</div>
			</div>
			<!-- <img src="https://themes.envytheme.com/ecademy/wp-content/uploads/2020/05/man-with-laptop.png" style="width: 100%;"> -->
		</div>
	</div>
</div>
<script type="text/javascript">
	// List of sentences
	var content_arr = [ "potential", "goals", "future" ];
	// Current sentence being processed
	var part = 0;
	// Character number of the current sentence being processed 
	var partIndex = 0;
	// Holds the handle returned from setInterval
	var intervalVal;
	// Element that holds the text
	var element = document.querySelector("#text");
	// Implements typing effect
	function Type() { 
		var text =  content_arr[part].substring(0, partIndex + 1);
		element.innerHTML = text;
		partIndex++;

		// If full sentence has been displayed then start to delete the sentence after some time
		if(text === content_arr[part]) {
			clearInterval(intervalVal);
			setTimeout(function() {
				intervalVal = setInterval(Delete, 50);
			}, 1000);
		}
	}
	// Implements deleting effect
	function Delete() {
		var text =  content_arr[part].substring(0, partIndex - 1);
		element.innerHTML = text;
		partIndex--;

		// If sentence has been deleted then start to display the next sentence
		if(text === '') {
			clearInterval(intervalVal);
			// If last sentence then display the first one, else move to the next
			if(part == (content_arr.length - 1))
				part = 0;
			else
				part++;
			partIndex = 0;

			// Start to display the next sentence after some time
			setTimeout(function() {
				intervalVal = setInterval(Type, 100);
			}, 200);
		}
	}
	// Start the typing effect on load
	intervalVal = setInterval(Type, 100);
</script>
<?php include'footer.php' ?>
