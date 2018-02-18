<?php
  session_start();
  if(empty($_SESSION["teacher_log_id"]))
  {
    header("location:index.php");
    exit(0);
  }
  if(empty($_SESSION['attendance_success']))
  {
    $_SESSION['attendance_success']=0;
  }
  include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teacher Login</title>
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
    font-size: 100%;
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
  .dropdown-style{
    width:100%;
    background-color: #f1f1f1;
  }
  .drop-border{
    border-bottom: ridge;
  }
  </style>
</head>
<body>
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
        <li class="active"><a href="teacher_profile.php" target="Iframe">Profile</a></li>
        <li class="text edit">My Subjects</li>
        <?php 
          $tid=$_SESSION["teacher_log_id"];
          $sql="SELECT course.cname, course.cid from teacher inner join alloted_subject on alloted_subject.tid='$tid' inner join course on alloted_subject.cid=course.cid ";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
              $cname=$row['cname'];
              $acid=$row['cid'];
              echo "<li class='dropdown drop-border'><a class='dropdown-toggle' data-toggle='dropdown' href='#''>";
              echo "$cname";
              echo "<span class='caret'></span></a>";
              echo "<ul class='dropdown-menu dropdown-style' >";
              echo "<li><a href='attendance_insert.php?cid=$acid' target='Iframe'>Insert Attendance</a></li>";
              echo "<li><a href='attendance_update_entry.php?cid1=$acid' target='Iframe'>Update Attendance</a></li>";
              echo "<li><a href='attendance_report.php?cid2=$acid' target='Iframe'>Attendance Report</a></li>";
              echo "</ul>";
              echo "</li>";
            }
          } 
        ?>
        <li><a href="teacher_logout.php">Logout</a></li>
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
  <div class="container-fluid" style="margin-left: -1.6%;">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8"><img src="logo.png" width='100%' style="margin-bottom: 1.5%; "></div>
      <div class="col-sm-2"></div>
      </div>
      <ul class="nav nav-pills nav-stacked">
        <?php
          $id=$_SESSION["teacher_log_id"];
          $sql="SELECT tname from teacher WHERE tid='$id'";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
              echo "<li class='text edit'>";
              echo "<i>Hello, ".$row["tname"]."</i>";
             }
          } 
        ?>
        <li class="active text"><a href="teacher_profile.php" target="Iframe">Profile</a></li>
        <li class="text edit">My Subjects</li>
        <?php 
          $tid=$_SESSION["teacher_log_id"];
          $sql="SELECT course.cname, course.cid from teacher inner join alloted_subject on alloted_subject.tid=teacher.tid inner join course on alloted_subject.cid=course.cid where teacher.tid='$tid'";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {

            while($row = mysqli_fetch_assoc($result))
            {
              $cname=$row['cname'];
              $acid=$row['cid'];
              $sql1="SELECT semester, branch from course WHERE cid='$acid'";
              $result1=$conn->query($sql1);
              $row1=$result1->fetch_assoc();
              echo "<li class='dropdown drop-border'><a class='dropdown-toggle' data-toggle='dropdown' href='#''>";
              echo $cname."( ".$row1['semester']." sem, ".$row1['branch'].")";
              echo "<span class='caret'></span></a>";
              echo "<ul class='dropdown-menu dropdown-style' >";
              echo "<li><a href='attendance_insert.php?cid=$acid' target='Iframe'>Insert Attendance</a></li>";
              echo "<li><a href='attendance_update_entry.php?cid1=$acid' target='Iframe'>Update Attendance</a></li>";
              echo "<li><a href='attendance_report.php?cid2=$acid' target='Iframe'>Attendance Report</a></li>";
              echo "</ul>";
              echo "</li>";
              /*echo "<li class='text'>";
              echo "<a href='attendance_update.php?cid=$acid' target='Iframe'>";
              echo $cname."( ".$row1['semester']." sem, ".$row1['branch'].")";
              echo "</a></li>";*/
            }
          } 
        ?>
        <li><a href="teacher_logout.php"><span class="glyphicon glyphicon-off"></span>   Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <iframe src="teacher_profile.php" width="100%" height="847px" target='_top' name="Iframe" frameborder="0">
      </iframe>        
    </div>
  </div>
  </div>
  <div class="row">
    <footer class="container-fluid text-center footer">
      <p>2017 Copyright &copy; Attendance System</p>
    </footer> 
  </div>  
</div>

</body>
</html>
