<?php
  session_start();
  if(empty($_SESSION["stu_log_id"]))
  {
    header("location:index.php");
    exit(0);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    .back{
      background-color: #000;
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
  .text{
    font-size: 120%;
    font-family: sans-serif;
    color: #5cb85c;
    border-bottom: ridge;
  }
  .edit{
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 140%;
    text-align: center;
    color: #001433;
  }
  .footer{
    background-color: #555;
      color: white;
      padding: 15px;
      margin-bottom: 0px;
  }
  .color{
    background-color: #5cb85c;
  }
  </style>
</head>
<body>
<?php include "connect.php"; ?>
<!--collapse navigation bar-->
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">IIIT BHUBANESWAR</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
          $id=$_SESSION["stu_log_id"];
          $sql="SELECT sname from student WHERE sid='$id'";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
              echo "<li class='text edit'>";
              echo "<i>Hello, ".$row["sname"]."</i>";
             }
          } 
        ?>
        <li class="active"><a href="student_profile.php" target="Iframe">Profile</a></li>
        <li class="text edit">My Subjects</li>
        <?php 
          $sid=$_SESSION["stu_log_id"];
          $sql="SELECT cname,cid FROM course INNER JOIN student ON course.semester = student.semester AND course.branch=student.branch AND student.sid='$sid'";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
              $cname=$row['cname'];
              $id=$row['cid'];
              echo "<li class='text'>";
              echo "<a href='subject_attendance.php?id=$id' target='Iframe'>";
              echo $cname;
              echo "</a></li>";
            }
          } 
        ?>
        <li><a href="student_logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--Side navigatiion bar-->
<div class="container-fluid">
  <div class="row ">
      <nav class="collapse navbar-collapse back" id="myNavbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand logo" href="#">International Institute of Information Technology</a>
          </div>
        </div>
      </nav>
  </div>
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs">
      <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8"><img src="logo.png" width='100%' style="margin-bottom: 1.5%; "></div>
      <div class="col-sm-2"></div>
      </div>
      <ul class="nav nav-pills nav-stacked">
        <?php
          $id=$_SESSION["stu_log_id"];
          $sql="SELECT sname from student WHERE sid='$id'";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
              echo "<li class='text edit'>";
              echo "<i>Hello, ".$row["sname"]."</i>";
             }
          } 
        ?>
        <li class="active text"><a href="student_profile.php" target="Iframe">Profile</a></li>
        <li class="text edit">My Subjects</li>
        <?php 
          $sid=$_SESSION["stu_log_id"];
          $sql="SELECT cname,cid FROM course INNER JOIN student ON course.semester = student.semester AND course.branch=student.branch AND student.sid='$sid'";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
              $cname=$row['cname'];
              $id=$row['cid'];
              echo "<li class='text'>";
              echo "<a href='subject_attendance.php?id=$id' target='Iframe'>";
              echo $cname;
              echo "</a></li>";
            }
          } 
        ?>
        <li><a href="student_logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-10">
      <iframe src="student_profile.php" width="100%" height="847px" target='_top' name="Iframe" frameborder="0">
      </iframe>        
    </div>
  </div>
</div>
<footer class="container-fluid text-center footer">
  <p>2017 Copyright &copy; Attendance System</p>
</footer>
</body>
</html>
