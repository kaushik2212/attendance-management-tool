<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  	.box{
 
  		border:groove;
  		border-color: #5cb85c;
  		background-color: #f2f2f2;

  	}
  </style>
</head>
<body>
	<div class="row" style="margin-top: 6.5%;">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h2 style="text-align: center;">Course Update</h2>
			<div class="col-sm-2"></div>
			<div class="col-sm-8 box">
			<form action="course_update_backend.php" method="POST" enctype="multipart/form-data">
				<br>
				
				<?php
					if(!empty($_SESSION['course_update_success']))
					{
	 					if($_SESSION['course_update_success']===1)
	 					{
	 						echo "<h4 style='color: green;'>";
	 						echo "Course updated successfully";
	 						$_SESSION['course_update_success']="";
	 						echo "</h4>";
		 				}
						if($_SESSION['course_update_success']===0)
	 					{
	 						echo "<h4 style='color: red'>";
	 						echo "Course updation failed";
	 						$_SESSION['course_update_success']="";
	 						echo "</h4>";
	 					}
	 				}
 					?>
				</h4>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-user"></span> Course I.D.</label>
					<input type="text" name="cid" class="form-control" placeholder="Enter Course I.D." autocomplete="off">
				</div>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-user"></span> Course Name</label>
					<input type="text" name="cname" class="form-control" placeholder="Enter Course name" autocomplete="off">
				</div>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-education"></span> Branch</label>
					<select class="form-control" autocomplete="off" name="branch">
						<option selected disabled>Select Branch</option>
						<option value="CSE">CSE</option>
						<option value="IT">IT</option>
						<option value="ETC">ETC</option>
						<option value="EEE">EEE</option>
					</select>
				</div>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-collapse-down"></span> Semester</label>
					<select class="form-control" autocomplete="off" name="semester">
						<option selected disabled>Select Semester</option>
						<option value="1st">1st</option>
						<option value="2nd">2nd</option>
						<option value="3th">3rd</option>
						<option value="4th">4th</option>
						<option value="5th">5th</option>
						<option value="6th">6th</option>
						<option value="7th">7th</option>
						<option value="8th">8th</option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block">
				</div>
			</form>
		</div>
		</div>
	</div>
</body>
</html>