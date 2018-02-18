<?php
  session_start();
  if(empty($_SESSION["admin_usr"]))
  {
    header("location:index.php");
    exit(0);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin | Home</title>
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
  .dropdown-style{
    width:100%;
    background-color: #f1f1f1;
  }
  .drop-border{
    border-bottom: ridge;
    border-color: #999999;
  }
  </style>
</head>
<body>
<?php include "../connect.php"; ?>
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
      <ul class="nav navbar-nav">.
        <li class="text edit"><i>Hello, Administrator</i></li>
        <li class="text"><a href="admin_report.php" target="Iframe_admin">Report</a></li> 
        <li class='dropdown drop-border text'><a class='dropdown-toggle' data-toggle='dropdown' href='#''>Subject Allotment
          <span class='caret'></span></a>
          <ul class='dropdown-menu dropdown-style' >
            <li>
              <li class="drop-border"><a href='subject_allot.php' target='Iframe'>Allot Subjects</a></li>
              <li><a class="drop-border" href='subject_allot_delete.php' target='Iframe'>Delete Data</a></li>
            </li>
          </ul>
        </li>

        <li class="text"><a href="course_update.php" target="Iframe">Update Course</a></li>
        <li class="text"><a href="update_student.php" target="Iframe">Update Student List</a></li>
        <li class="text"><a href="update_branch.php" target="Iframe">Update Branch</a></li>
        <li class="text"><a href="add_teacher.php" target="Iframe">Add Teacher</a></li>
        <li class="text"><a href="search_student.php" target="Iframe">Search Student</a></li>
        <li class="text"><a href="admin_logout.php">Logout</a></li>
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
      <div class="col-sm-8"><img src="../logo.png" width='100%' style="margin-bottom: 1.5%; "></div>
      <div class="col-sm-2"></div>
      </div><br>
      <?php
        if(!empty($_SESSION['delete_subject_allot']))
        {
          if($_SESSION['delete_subject_allot']===1)
          {
            //echo "<h4 style='color:green;'>"."Data Deleted"."</h4>";
            alert("Data Deleted");
            $_SESSION['delete_subject_allot']="";
          }
          if($_SESSION['delete_subject_allot']===0)
          {
            //echo "<h4 style='color:red;'>"."* Error!! Data not deleted"."</h4>";
            alert("* Error!! Data not deleted");
            $_SESSION['delete_subject_allot']="";
          }
        }
      ?>

      <ul class="nav nav-pills nav-stacked">
        <li class="text edit"><i>Hello, Administrator</i></li>
       <li class="active text"><a href="admin_report.php" target="Iframe">Report</a></li>
        <li class='dropdown text'><a class='dropdown-toggle' data-toggle='dropdown' href='#''>Subject Allotment       <span class='caret'></span></a>
          <ul class='dropdown-menu dropdown-style' >
            <li>
              <li class="drop-border"><a href='subject_allot.php' target='Iframe'>Allot Subjects</a></li>
              <li><a class="drop-border" href='subject_allot_delete.php' target='Iframe'>Delete Data</a></li>
            </li>
          </ul>
        </li>
        <li class="text"><a href="course_update.php" target="Iframe">Update Course</a></li>
        <li class="text"><a href="update_student.php" target="Iframe">Update Student List</a></li>
        <li class="text"><a href="update_branch.php" target="Iframe">Update Branch</a></li>
        <li class="text"><a href="add_teacher.php" target="Iframe">Add Teacher</a></li>
        <li class="text"><a href="search_student.php" target="Iframe">Search Student</a></li>
        <li class="text"><a href="admin_logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-10">
      <iframe src="admin_report.php" width="100%" height="847px" target='_top' name="Iframe" frameborder="0">
      </iframe>        
    </div>
  </div>
</div>
<?php $conn->close();?>
<footer class="container-fluid text-center footer">
  <p>2017 Copyright &copy; Attendance System</p>
</footer>
</body>
</html>
