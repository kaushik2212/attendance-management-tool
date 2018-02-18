<?php session_start(); include "../connect.php";?>
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
			<h2 style="text-align: center;">Subject Allotment</h2>
			<div class="col-sm-2"></div>
			<div class="col-sm-8 box">
			<form action="course_allot_backend.php" method="POST" enctype="multipart/form-data">
				<br>
				<?php
					if(!empty($_SESSION['subject_allot_success']))
					{
	 					if($_SESSION['subject_allot_success']===1)
	 					{
	 						echo "<h4 style='color: green;'>";
	 						echo "Course updated successfully";
	 						$_SESSION['subject_allot_success']="";
	 						echo "</h4>";
		 				}
						if($_SESSION['subject_allot_success']===0)
	 					{
	 						echo "<h4 style='color: red'>";
	 						echo "Course updation failed";
	 						$_SESSION['subject_allot_success']="";
	 						echo "</h4>";
	 					}
	 				}
 					?>
				</h4>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-education"></span> Branch</label>
					<select class="form-control" autocomplete="off" name="cid">
						<option selected disabled>Select Course</option>
						<?php
							$x=0;
							$sql="SELECT * FROM course";
							$result=$conn->query($sql);
							
							while ($row=mysqli_fetch_assoc($result)) 
							{
								$sql1="SELECT * FROM alloted_subject";
								$result1=$conn->query($sql1);
								$row1=mysqli_fetch_assoc($result1);
								do
								{
									if($row['cid']===$row1['cid'])
									{
										$x=0;
										break;
									}
									else
									{
										$x=1;
									}
								}while ($row1=mysqli_fetch_assoc($result1));
								if($x===1)
								{
									echo "<option value='".$row['cid']."'>";
										echo $row['cname'].", ".$row['semester'].", ".$row['branch'];
										echo "</option>";
										$x=0;
								}
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-education"></span> Branch</label>
					<select class="form-control" autocomplete="off" name="tid">
						<option selected disabled>Select Teacher</option>
						<?php
							$sql3="SELECT tid,tname FROM teacher";
							$result3=$conn->query($sql3);
							
							while ($row3=mysqli_fetch_assoc($result3)) 
							{
								echo "<option value='".$row3['tid']."'>";
								echo $row3['tid'].",    ".$row3['tname'];
								echo "</option>";
							}
						?>
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