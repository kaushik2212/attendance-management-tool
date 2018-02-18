<?php 
	ob_start();
	session_start();
	include "../connect.php";
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
  	.error {color: #FF0000;}
  	.message{
    color:#1e1b72;
    font-size: 120%;
    margin-top: 10%;
  }
  </style>
</head>
<body>
	<!--Sign UP-->
 <?php
    $tidErr = $emailErr = $tnameErr = $phnoErr=$passErr=$cpassErr=$dobErr="" ;
    $tid=$emailid=$tname=$password=$phno=$dob=$msg=""; 
    $p=0;
    $x=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      if (empty($_POST["tid"]))
      {
        $sidErr = "* teacher id is required";
        $x=0;
      } 
      else 
      {
        $tid = $_REQUEST["tid"];
        $x=1;
      }
      
      if (empty($_POST["emailid"]))
      {
        $emailErr = "* Email id required";
        $x=0;
      } 
      else 
      {
        $emailid = $_REQUEST["emailid"];
        $x=1;
      }
      
      if (empty($_POST["tname"]))
      {
        $tnameErr = "* Name is required";
        $x=0;
      }
      else 
      {
        $tname = $_REQUEST["tname"];
        $x=1;
      }
      /*Password*/
      if (empty($_POST["pass"]))
      {
        $passErr = "* password is required";
        $x=0;
        $p=0;
      }
      else 
      {
        $x=1;
        $p=1;
      }
      /*confirm password*/
      if (empty($_POST["cpass"]))
      {
        $cpassErr = "* Password confirmation required";
        $x=0;
        $p=0;
      }
      else 
      {
        if($p==1)
        {
          if(strcmp($_REQUEST['pass'], $_REQUEST['cpass'])==0)
          {
            $password=base64_encode($_REQUEST['pass']);
            $x=1;
          }
          else
          {
            $cpassErr ="* Password doesnt match"; 
            $x=0;
          }
        }
      }
      /* confirm password end*/
      if (empty($_POST["phno"]))
      {
        $phnoErr = "* contact is required";
        $x=0;
      }
      else 
      {
        $phno = $_REQUEST["phno"];
        $x=1;
      }
      if($x==1)
      {
        $sql="INSERT INTO teacher(tid, tname, password) VALUES ('$tid', '$tname','$password')";
        $sql1="INSERT INTO teacher_details(tid, phone_no, email,dob) VALUES ('$tid', '$phno', '$emailid','$dob')";
        if(mysqli_query($conn,$sql))
        {
         if(mysqli_query($conn,$sql1))
          {
           $msg="Teacher has been successfully registered!!"; 
          }
          else
          {
           echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
          }
        }
        else
        {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
      mysqli_close($conn);
    }
  ?>
	<div class="row" style="margin-top: 6.5%;">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h2 style="text-align: center;">Teacher Details</h2>
			<div class="col-sm-2"></div>
			<div class="col-sm-8 box">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
				<br>
				
				<p class="message"><?php echo $msg; ?></p>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-user"></span> Teacher I.D.</label>
					<input type="text" name="tid" class="form-control" placeholder="Enter Teacher I.D." autocomplete="off">
				</div>
				<p class="error"> <?php echo $tidErr;?></p>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-lock"></span>Password</label>
					<input type="password" name="pass" class="form-control" placeholder="Enter Password" autocomplete="off">
				</div>
				<p class="error"> <?php echo $passErr;?></p>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-lock"></span>Password</label>
					<input type="password" name="cpass" class="form-control" placeholder="Confirm Password" autocomplete="off">
				</div>
				<p class="error"> <?php echo $cpassErr;?></p>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-user"></span> Teacher Name</label>
					<input type="text" name="tname" class="form-control" placeholder="Enter Teacher Name" autocomplete="off">
				</div>
				<p class="error"> <?php echo $tnameErr;?></p>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-phone"></span>Phone No.</label>
					<input type="text" name="phno" class="form-control" placeholder="Enter Phone number" autocomplete="off">
				</div>
				<p class="error"> <?php echo $phnoErr;?></p>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-envelope"></span>Email I.D.</label>
					<input type="email" name="emailid" class="form-control" placeholder="Enter Email I.D." autocomplete="off">
				</div>
				<p class="error"> <?php echo $emailErr;?></p>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-calendar"></span>Date Of Birth</label>
					<input class='form-control' id='datepicker' name='date' type='text' placeholder='mm/dd/yyyy' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'yyyy/mm/dd';}' required='''>
				</div>
				<p class="error"> <?php echo $dobErr;?></p>
				<div class="form-group">
					<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block">
				</div>
			</form>
		</div>
		</div>
    <!-- strat-date-piker -->
  <link rel="stylesheet" href="../css/jquery-ui.css" />
  <script src="../js/jquery-ui.js"></script>
    <script>
        $(function() {
        $( "#datepicker,#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>
  <!-- //End-date-piker -->
	</div>
  <?php $conn->close();?>
</body>
</html>