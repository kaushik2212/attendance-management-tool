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
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .head{
      font-weight: bold;
      text-align: center;
      padding-bottom: 4%;
      text-decoration: underline;
      font-family: aerial;
    }
    .edit{
      text-align: center;
    }
    input[type=submit]{
      width: 62%;
      background-color: #5cb85c;
    }
    input[type=submit]:hover{
      box-shadow: 0 5px 5px 0;
    }
  </style>
  <script>

  </script>
</head>
<body>
  <div class="container">
    <?php
        if(!empty($_REQUEST['cid']))
        {
          $cid=$_REQUEST['cid'];
          $_SESSION['coursecheck']=$cid;
        }
        $cid=$_SESSION['coursecheck'];
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
    <form action="attendance_entry.php" method="POST">
      <div class="container-fluid">
        <?php
        if(empty($_SESSION['attendance_success']))
        {
          $_SESSION['attendance_success']="";
        }
        else
        {
          if($_SESSION['attendance_success']===1)
          {
              echo "<p style='color:green;'>* Attendance updated successfully</p>";
              $_SESSION['attendance_success']="";
          }
          if($_SESSION['attendance_success']===0)
          {
            echo "<p style='color:red;'>* Error occured during update / Attendance already updated for this date</p>";
            $_SESSION['attendance_success']="";
          }
        }
          
        ?>
        <div class="row">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input class='form-control' id='datepicker' name='date' type='text' value='mm/dd/yyyy' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'yyyy/mm/dd';}' required='''>
          </div>
        </div>
        <div class="row" style="margin-top: 2%;">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <table class="table">
              <thead>
                <tr class="font" style="background-color: #5cb85c;">
                  <th>Sl. no.</th>
                  <th>Student I.D.</th>
                  <th>Student name</th>
                  <th>Present</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $count=1;
                  if(isset($_REQUEST['cid']))
                  {
                    $cid=$_REQUEST['cid'];
                    $_SESSION["course_id"]=$cid;
                  }
                  $sid=$_SESSION['teacher_log_id'];
                  $cid=$_SESSION['course_id'];
                  $sql="SELECT sid,sname from student where semester=(SELECT semester FROM course WHERE cid ='$cid') AND branch=(SELECT branch FROM course WHERE cid ='$cid')";
                  $result=$conn->query($sql);
                  if($result->num_rows>0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      if($count%2==0)
                      {
                        echo "<tr class='success'>";
                      }
                      else
                      {
                        echo "<tr class='font'>";
                      }
                      echo "<td>";
                      echo $count;
                      echo "</td>";
                      echo "<td>";
                      echo $row['sid'];
                      echo "</td>";
                      echo "<td>";
                      echo $row['sname'];
                      echo "</td>";
                      echo "<td >";
                      echo "<input type='checkbox' name='present[]' value='".$row['sid']."' >";
                      echo "</td>";
                      echo "</tr>";
                      $count++;
                    }
                  } 
                  $_SESSION["count"]=$count;
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class='row edit'>
          <input type='submit' name='submit' value='Submit' class='button-success btn'">
        </div>
      </div>
    </form>
  </div>
  <!-- strat-date-piker -->
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
        $( "#datepicker,#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>
  <!-- //End-date-piker -->
</body>
</html>

