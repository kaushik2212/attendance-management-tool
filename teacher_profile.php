<?php
  session_start();
  if(empty($_SESSION["teacher_log_id"]))
  {
    header("location:index.php");
    exit(0);
  }
  include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="http://www.clubdesign.at/floatlabels.js"></script>
  <title>Student Profile</title>
</head>
<style>
	.fit{
		width:100%;
	}
	.username_font{
		font-size: 180%;
	}
	.font{
		font-size: 140%;
		font-family: sans-serif;
		text-align: left;
		font-weight: bold; 	
	}
	.answer_font{
		font-size: 140%;
		font-family: sans-serif;
		text-align: left;
	}
	.subfont{
		text-align: left;

	}
</style>
<body>
<div class="container">
	<div class="row">
	
       <div class="col-md-12 ">

			<div class="panel panel-default">
			  <div class="panel-heading"><h4 style="text-align: center;"><strong>My Profile</strong></h4></div>
			   <div class="panel-body">
			    <div class="box box-info">
			      <div class="box-body">
			      	<div class="row">
			        <div class="col-sm-12">
			           <div  align="center"> <img alt="User Pic" height="25%" width="25%" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">               
                        </div>              
			            <br>
			            </div>
			            </div>
			            <div align="center" class="row">
				            <div class="col-sm-12">
				            	<h4 style="color:#00b1b1;" class="username_font">
				            		<?php
				            		$id=$_SESSION["teacher_log_id"];
				            		$sql="SELECT tname from teacher WHERE tid='$id'";
				            		$result=$conn->query($sql);
							          if($result->num_rows>0)
							          {
							            while($row = mysqli_fetch_assoc($result))
							            {
							              echo $row["tname"];
							            }
							          } 
				            	?>
				            	</h4>
				            </div>   
			            </div>
			            <div class="clearfix"></div>
			            <!--Student details-->
			            <div class="row" align="center">
			            <hr style="margin:5px 0 5px 0;">
			            <!--Student ID-->
			            <div align="center" class="row">
				            <div class="col-sm-6">
				            	<div class="col-sm-4">
				            	</div>
				            	<div class="col-sm-8">
				            	<h4 class="tital font">TEACHER ID : </h4>
				            	</div>
				            </div>   
				            <div class="col-sm-6">
				            	<div class="col-sm-4">
				            	</div>
				            	<div class="col-sm-8">
				            	<h4 class="tital answer_font"><?php echo $_SESSION["teacher_log_id"];?></h4>
				            	</div>
				            </div>   
			            </div>
						<div class="clearfix"></div>
						<div class="bot-border"></div>
						<!--Student ID-->
			            <div align="center" class="row">
				            <div class="col-sm-6">
				            	<div class="col-sm-4">
				            	</div>
				            	<div class="col-sm-8">
				            	<h4 class="tital font">EMAIL ID : </h4>
				            	</div>
				            </div>   
				            <div class="col-sm-6">
				            	<div class="col-sm-4">
				            	</div>
				            	<div class="col-sm-8">
				            	<h4 class="tital answer_font">
				            	<?php
				            		$id=$_SESSION["teacher_log_id"];
				            		$sql="SELECT email from teacher_details WHERE tid='$id'";
				            		$result=$conn->query($sql);
							          if($result->num_rows>0)
							          {
							            while($row = mysqli_fetch_assoc($result))
							            {
							              echo $row["email"];
							            }
							          } 
				            	?>
				            	</h4>
				            	</div>
				            </div>   
			            </div>
						<div class="clearfix"></div>
						<div class="bot-border"></div>
						<!--Contsct number-->
			            <div align="center" class="row">
				            <div class="col-sm-6">
				            	<div class="col-sm-4">
				            	</div>
				            	<div class="col-sm-8">
				            	<h4 class="tital font">CONTACT NUMBER : </h4>
				            	</div>
				            </div>   
				            <div class="col-sm-6">
				            	<div class="col-sm-4">
				            	</div>
				            	<div class="col-sm-8">
				            	<h4 class="tital answer_font">
				            	<?php
				            		$id=$_SESSION["teacher_log_id"];
				            		$sql="SELECT phone_no from teacher_details WHERE tid='$id'";
				            		$result=$conn->query($sql);
							          if($result->num_rows>0)
							          {
							            while($row = mysqli_fetch_assoc($result))
							            {
							              echo $row["phone_no"];
							            }
							          } 
				            	?>
				            	</h4>
				            	</div>
				            </div>   
			            </div>
						<div class="clearfix"></div>
						<div class="bot-border"></div>
						<!--DAte of Birth-->
			            <div align="center" class="row">
				            <div class="col-sm-6">
				            	<div class="col-sm-4">
				            	</div>
				            	<div class="col-sm-8">
				            	<h4 class="tital font">DATE OF BIRTH : </h4>
				            	</div>
				            </div>   
				            <div class="col-sm-6">
				            	<div class="col-sm-4">
				            	</div>
				            	<div class="col-sm-8">
				            	<h4 class="tital answer_font">
				            		<?php
				            		$id=$_SESSION["teacher_log_id"];
				            		$sql="SELECT dob from teacher_details WHERE tid='$id'";
				            		$result=$conn->query($sql);
							          if($result->num_rows>0)
							          {
							            while($row = mysqli_fetch_assoc($result))
							            {
							              echo $row["dob"];
							            }
							          } 
				            	?>
				            	</h4>
				            	</div>
				            </div>   
			            </div>
						<div class="clearfix"></div>
						<div class="bot-border"></div>
						<?php $conn->close();?>
					</div>
							<!-- /.box-body -->
					</div>
								 <!-- /.box -->

				</div>
			</div> 
		</div>
	</div>  
    </div>
	</div>
</body>
</html>