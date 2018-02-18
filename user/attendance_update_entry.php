<?php session_start(); 
$_SESSION['course_id']=$_REQUEST['cid1'];
if(empty($_SESSION['update_success']))
  {
    $_SESSION['update_success']=0;

  }
  include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .message{
    color:#1e1b72;
    font-size: 120%;
    margin-top: 10%;
    text-align: center;
  }
  .head{
      font-weight: bold;
      text-align: center;
      padding-bottom: 4%;
      text-decoration: underline;
      font-style: sans-serif;
    }
  </style>
  <script>
    
  </script>
</head>
<div class="container-fluid">
  <?php
    $cid=$_SESSION['course_id'];
    $sql="SELECT cname FROM course WHERE cid='$cid'";
    $result=$conn->query($sql);
    if($result->num_rows===1)
    {
      $row=$result->fetch_assoc();
      echo "<h2 class='head'>";
      echo $row['cname'];
      echo "</h2>";
    }
  ?>
  <div class="row">
    <div class="container">
      <?php 
          if($_SESSION["attendance_success"]==1)
          {
            echo "<p class='message'>*Attendance updated successfully</p>";
            $_SESSION["attendance_success"]=0;
          }
        ?>
      <form class="form" action="attendance_update.php" method="POST" target="Iframe1">
        <div class="form-group">
          <label for="Date">Date:</label>
          <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
        </div>
        <button type="submit" value="submit" name="submit" class="btn btn-default">Search</button>
      </form>
    </div>  
  </div>
  <div class="row">
    <iframe src="#" width="100%" height="600px" target='_top' name="Iframe1" frameborder="0">
      </iframe>  
  </div>
  
</div>
<body>
</body>
</html>