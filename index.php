<?php
  session_start();
  if(!empty($_SESSION["stu_log_id"]))
  {
    header("location:student_index.php");
    exit(0);
  }
  else if(!empty($_SESSION["teacher_log_id"]))
  {
    header("location:teacher_index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 400px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 0px;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
      .logo{font-size: 100%;}
    }
    @media screen and(max-width: 326px){
      .logo {
        font-size: 85%;
      }
    }
    .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
      margin: initial;
      margin-top: 
  }
  .logo{
    float:left;height:50px;padding:15px 15px;font-size:18px;line-height:20px
    text-decoration: none;
    font-size: 175%;
    color: #fff;
    font-style: sans-serif;
  }
  .logo:hover{
    text-decoration: none;
    color: #fff;
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
<?php  include "connect.php";  ?>
<nav class="navbar navbar-inverse" style="background-color: #2e2e1f;">
  <div class="container-fluid">
    <a class="logo" href="#">International Institute of Information Technology</a>

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        
      </ul>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="login.php" enctype="multipart/form-data" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="usrname" placeholder="Enter ID" required autocomplete="off">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="psw" placeholder="Enter password" required autocomplete="off">
            </div>
            <label class="radio-inline">
              <input type="radio" value="student" name="log-type" autocomplete="off" required>Student
            </label>
            <label class="radio-inline">
              <input type="radio" name="log-type" value="teacher" required autocomplete="off"> Teacher
            </label>
              <br><input type="submit" value="Login" name="submit" style="margin-top: 10px;" class="btn btn-success btn-block">
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="index.php">Sign Up</a></p>
          <p>Forgot <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#forgot">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
  <!--Modal End-->
  <!--Forgot password modal-->
  <div class="modal fade" id="forgot" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span>Forgot Password?</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="password_update.php" enctype="multipart/form-data" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="usrname" placeholder="Enter ID" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> New Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Enter new password" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
              <input type="password" class="form-control" name="cpass" placeholder="Confirm your new password" autocomplete="off">
            </div>
            <label class="radio-inline">
              <input type="radio" value="student" name="log-type" autocomplete="off" >Student
            </label>
            <label class="radio-inline">
              <input type="radio" name="log-type" value="teacher" autocomplete="off"> Teacher
            </label>
              <br><input type="submit" value="Login" name="submit" style="margin-top: 10px;" class="btn btn-success btn-block">
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="index.php">Sign Up</a></p>
          <p><a href="#" data-toggle="modal" data-dismiss="modal" data-target="#myModal">Login</a></p>
        </div>
      </div>
      
    </div>
  </div> 
  <!--Forgaot password modal end-->
  </div>
</nav>
<!--Sign UP-->
 <?php
    $sidErr = $emailErr = $snameErr = $branchErr = $semesterErr=$passwordErr=$contactErr=$passErr=$cpassErr=$dateErr="" ;
    $sid=$emailid=$sname=$password=$contact=$branch=$semester=$msg=$dt=""; 
    $p=0;
    $x=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      if (empty($_POST["sid"]))
      {
        $sidErr = "student id is required";
        $x=0;
      } 
      else 
      {
        $sid = $_REQUEST["sid"];
        $x=1;
      }
      
      if (empty($_POST["emailid"]))
      {
        $emailErr = "Email id required";
        $x=0;
      } 
      else 
      {
        $emailid = $_REQUEST["emailid"];
        $x=1;
      }
      
      if (empty($_POST["sname"]))
      {
        $snameErr = "Name is required";
        $x=0;
      }
      else 
      {
        $sname = $_REQUEST["sname"];
        $x=1;
      }
      /*Password*/
      if (empty($_POST["password"]))
      {
        $passErr = "password is required";
        $x=0;
        $p=0;
      }
      else 
      {
        $x=1;
        $p=1;
      }
      /*confirm password*/
      if (empty($_POST["cpassword"]))
      {
        $cpassErr = "Password confirmation required";
        $x=0;
        $p=0;
      }
      else 
      {
        if($p==1)
        {
          if(strcmp($_REQUEST['password'], $_REQUEST['cpassword'])==0)
          {
            $password=base64_encode($_REQUEST['password']);
            $x=1;
          }
          else
          {
            $cpassErr ="Password doesnt match"; 
            $x=0;
          }
        }
      }
      /* confirm password end*/
      if (empty($_POST["contactno"]))
      {
        $contactErr = "contact is required";
        $x=0;
      }
      else 
      {
        $contact = $_REQUEST["contactno"];
        $x=1;
      }
      if (empty($_POST["date"]))
      {
        $dateErr = "Date of Birth is required";
        $x=0;
      }
      else 
      {
        $dt = $_REQUEST["date"];
        $x=1;
      }
      if($x==1)
      {
       $branch=$_REQUEST["branch"];
        $semester=$_REQUEST["semester"];
        $sql="INSERT INTO student(sid, sname, branch, semester, password) VALUES ('$sid', '$sname', '$branch', '$semester', '$password')";
        $sql1="INSERT INTO student_details(sid, phone_no, email,dob) VALUES ('$sid', '$contact', '$emailid','$dt')";
        if(mysqli_query($conn,$sql))
        {
         if(mysqli_query($conn,$sql1))
          {
           $msg="You have been successfully registered!!"; 
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

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 text-left image"> 
      <div style="margin-left: -2%;margin-right:-2%;opacity: 0.8;">
        <img src="iiit.jpg" width="100%" height="50%">
      </div>
    </div>
    <div class="col-sm-4">
      <div class="container-fluid sidenav">
        <h2>Sign Up</h2>
        <!--Sign Up form-->
         <div class="row myborder">
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="input-group margin-bottom-20" style="margin-bottom: 10px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Student I.D." name="sid" id="UserRegistration_username" type="text" autocomplete="off">   
            </div>
            <p class="error"> <?php echo $sidErr;?></p>
            <div class="input-group margin-bottom-20" style="margin-bottom: 10px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Password" name="password" id="UserRegistration_password" type="password" autocomplete="off">
            </div>
            <p class="error"> <?php echo $passErr;?></p>
            <div class="input-group margin-bottom-20" style="margin-bottom: 10px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Confirm Password" name="cpassword" id="UserRegistration_password" type="password" autocomplete="off">
            </div>
            <p class="error"> <?php echo $cpassErr;?></p>
            <div class="input-group margin-bottom-20" style="margin-bottom: 10px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Student Name" name="sname" id="UserRegistration_fname" type="text" autocomplete="off"> 
            </div>
            <p class="error"> <?php echo $snameErr;?></p>
            <div class="input-group margin-bottom-20" style="margin-bottom: 10px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Email" name="emailid" id="UserRegistration_address" type="email" style="margin-bottom: 5px;" autocomplete="off">
            </div>
            <p class="error"> <?php echo $emailErr;?></p>
            <div class="input-group margin-bottom-20" style="margin-bottom: 10px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Contact Number" name="contactno" id="Registration_contactnumber" type="number" autocomplete="off" >
            </div>
            <p class="error"> <?php echo $contactErr;?></p>
             <div class="input-group margin-bottom-20" style="margin-bottom: 10px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar mycolor"></i></span>
               <input class='form-control' id='datepicker' name='date' type='text' placeholder='yyyy/mm/dd' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'yyyy/mm/dd';}' required='''>
            </div>
            <p class="error"> <?php echo $dateErr;?></p>
            <div class="input-group margin-bottom-20" style="margin-bottom: 10px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                <select class="form-control" name="branch" placeholder="Branch">
                  <option value="CSE" selected>CSE</option>
                  <option value="IT">IT</option>
                  <option value="ETC">ETC</option>
                  <option value="EEE">EEE</option>
                </select>
             </div>
             <div class="input-group margin-bottom-20" style="margin-bottom: 10px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-collapse-down"></i></span>
                <select class="form-control" name="semester" placeholder="Semester">
                  <option value="1st" selected>1st</option>
                  <option value="2nd">2nd</option>
                  <option value="3rd">3rd</option>
                  <option value="4th">4th</option>
                  <option value="5th">5th</option>
                  <option value="6th">6th</option>
                  <option value="7th">7th</option>
                  <option value="8th">8th</option>
                </select>
             </div>
            <div style="margin-top: 5px;">
                    <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-block">
            </div>
            <p class="message"><?php echo $msg;?></p>
          </form>
    </div>
      </div>
    </div>
  </div>
</div>
<!-- strat-date-piker -->
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
        $( "#datepicker,#datepicker1" ).datepicker({ dateFormat: 'yyyy-mm-dd' });
        });
    </script>
  <!-- //End-date-piker -->
<footer class="container-fluid text-center ">
  <p>2017 Copyright &copy; Attendance System</p>
</footer>

</body>
</html>
