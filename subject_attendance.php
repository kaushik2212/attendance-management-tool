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
    }
    .font{
      font-size: 140%;
      
    }
    .space{
      margin-top: 5%;
    }
    .border{
      border: ridge;
    }
    .warning{
      color: #FF0000;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="head"> 
    <?php 
      include "connect.php";
      $id= $_REQUEST['id'];
      $sql3="SELECT cname from course WHERE cid='$id'";
      $result3=$conn->query($sql3);
      $row3=mysqli_fetch_assoc($result3);
      echo $row3['cname'];
    ?>
  </h2>
  <div class="container-fluid">
  <table class="table border">
    <thead>
      <tr class="font" style="background-color: #5cb85c;">
        <th>Sl. no.</th>
        <th>Date</th>
        <th>Present/Absent</th>
      </tr>
    </thead>
    <tbody>
        <?php
          $count=1;
          $id=$_REQUEST['id'];
          $sid=$_SESSION['stu_log_id'];
          $sql="SELECT a_date,present from attendance_table WHERE cid='$id' AND sid='$sid'";
          $result=$conn->query($sql);
          if($result->num_rows>0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
              if($count%2==0)
              {
                echo "<tr class='success font'>";
              }
              else
              {
                echo "<tr class='font'>";
              }
              echo "<td>";
              echo $count;
              $count++;
              echo "</td>";
              echo "<td>";
              echo $row['a_date'];
              echo "</td>";
              echo "<td>";
              if($row['present']=='P')
              {
                echo "Present";
              }
              else if($row['present']=='A')
              {
                echo "Absent";
              }
              echo "</td>";
              echo "</tr>";
            }
          } 
        ?>
    </tbody>
  </table>
</div>
<div class="container-fluid">
  <div class="panel panel-success space">
    <div class="panel-heading"><h4 style="text-decoration: underline;">ATTENDANCE REPORT</h4></div>
    <div class="panel-body">
      <?php
        $id=$_REQUEST['id'];
        $sid=$_SESSION['stu_log_id'];
        $sql="SELECT count(present) FROM attendance_table WHERE sid='$sid' AND cid ='$id' AND present='P'";
        $sql1="SELECT count(present) FROM attendance_table WHERE sid='$sid' AND cid ='$id'";
        $result=$conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $result1=$conn->query($sql1);   
        $row1 = mysqli_fetch_assoc($result1);
        /*ATTENDANCE PERCENTAGE CALCULATION*/
        if($row1['count(present)']!=0)
        {
          $p=($row['count(present)']/$row1['count(present)'])*100;
          echo "<div class='font' style='margin-right: 5%;'>Total classes : ";
          echo $row1['count(present)'];
          echo "</div>";
          echo "<div class='font'>Classes Attended : ";
          echo $row['count(present)'];
          echo "</div>";
          echo "<div class='font'>Attendance Percentage : ";
          if($p!=0)
          {
            echo round($p,2);
          }
          else
          {
            echo 0;
          }
          echo "%</div>";
        }
        else
        {
          echo "<div class='font' style='margin-right: 5%;'>Total classes : ";
          echo $row1['count(present)'];
          echo "</div>";
          echo "<div class='font'>Classes Attended : ";
          echo $row['count(present)'];
          echo "</div>";
          echo "<div class='font'>Attendance Percentage : ";
          echo 0;
          echo "%</div>";
        }
    ?>
    </div>
    <div class="panel-footer warning font">*Any error in attendance please contact your teacher</div>
  </div>
</div>
</div>

</body>
</html>

