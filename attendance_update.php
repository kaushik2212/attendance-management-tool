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
    .message{
    color:#1e1b72;
    font-size: 120%;
    margin-top: 10%;
    text-align: center;
  }
  .warning{
    color:#ff0000;
    font-size: 120%;
    margin-top: 10%;
    text-align: center;
  }
  </style>
</head>
<body>
  <div class="container">
    <form action="update_entry.php" method="POST">
      <div class="container-fluid">
        <?php 
          if($_SESSION["update_success"]==1)
          {
            echo "<p class='message'>*Attendance updated1 successfully</p>";
            $_SESSION["update_success"]=0;
          }

        ?>
        <div class="row">
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
                  <th>Date</th>
                  <th>Present/Absent</th>
                  <th>Change</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $count=1;
                  $tid=$_SESSION['teacher_log_id'];
                  $cid=$_SESSION['course_id'];
                  if(isset($_REQUEST['submit'])&&(!empty($_REQUEST['date'])))
                  {
                    echo $_REQUEST['date'];

                    $dt=$_REQUEST['date']; 
                    $_SESSION['date']=$dt;                 
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
                        echo $row['sname'];
                        $id=$row['sid'];
                        echo $id;
                        $sql1="SELECT present from attendance_table WHERE a_date='$dt' AND cid='$cid' AND tid='$tid' AND sid='$id'";
                        $result1=$conn->query($sql1);
                        if($result1->num_rows===1)
                        {
                          $row1=$result1->fetch_assoc();
                        echo "<td>";
                        echo $count;
                        echo "</td>";
                        echo "<td>";
                        echo $row['sid'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['sname'];
                        echo "</td>";
                        echo "<td>";
                        echo $dt;
                        echo "</td>";
                        echo "<td>";
                        if($row1['present']=='P')
                        {
                          echo "Present";
                        }
                        else if($row1['present']=='A')
                        {
                          echo "Absent";
                        }
                        echo "</td>";
                        echo "<td >";
                        echo "<input type='checkbox' name='update[]' value='".$row['sid']."' >";
                        echo "</td>";
                        echo "</tr>";
                        $count++;
                      }
                    }
                    } 
                  }
                  
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class='row'>
          <input type='submit' name='submit' value='Update' class='button-success btn'>
        </div>
      </div>
    </form>
  </div>
</body>
</html>

