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
    .text{
    font-size: 140%;
    font-family: aerial;
    font-weight: bold;
    text-align: center;
    color: #000;

  }
  .box{
    width:100%;
    border-bottom: ridge;
    border-radius: 15px;
    border-color: #4d94ff;
    margin-bottom: 0.8%;
  }
  .head{
      font-weight: bold;
      text-align: center;
      padding-bottom: 4%;
      text-decoration: underline;
      font-family: aerial;
  }
  </style>
</head>
<body>
  <div class="container-fluid">
    <?php
        $cid=$_SESSION['cid'];
        $sql="SELECT cname FROM course WHERE cid='$cid'";
        $result=$conn->query($sql);
        if($result->num_rows===1)
        {
          $row=$result->fetch_assoc();
          echo "<h2 class='head'>";
          echo $row['cname'];
          echo "</h2>";
        }
        switch ($_REQUEST['reportid']) 
        {
          case '1':
            $_SESSION['reportid']=$_REQUEST['reportid'];
            echo "<div class='row box'>";
            echo "<p class='text'>Students with x% of attendance</p>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<form class='form ' action='report_calc.php' method='POST' target='Iframe2'>";
            echo "<div class='form-group'>";
            echo "<label>Enter percentage attendance :</label>";
            echo "<input type='text' name='x' class='form-control'>";
            echo "</div>";
            echo "<button type='submit' value='1' name='submit' class='btn btn-default'>Search</button>";
            echo "</form>";
            echo "</div>";
            break;
          case '2':
            $_SESSION['reportid']=$_REQUEST['reportid'];
            echo "<div class='row box'>";
            echo "<p class='text'>Students above x% of attendance</p>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<form class='form' action='report_calc.php' method='POST' target='Iframe2'>";
            echo "<div class='form-group'>";
            echo "<label>Enter percentage attendance :</label>";
            echo "<input type='text' class='form-control' name='x'>";
            echo "</div>";
            echo "<button type='submit' value='2' name='submit' class='btn btn-default'>Search</button>";
            echo "</form>";
            echo "</div>";
            break;
          case '3':
            $_SESSION['reportid']=$_REQUEST['reportid'];
            echo "<div class='row box'>";
            echo "<p class='text'>Students below x% of attendance</p>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<form class='form' action='report_calc.php' method='POST' target='Iframe2'>";
            echo "<div class='form-group'>";
            echo "<label>Enter percentage attendance :</label>";
            echo "<input type='text' class='form-control' name='x'>";
            echo "</div>";
            echo "<button type='submit' value='3' name='submit' class='btn btn-default'>Search</button>";
            echo "</form>";
            echo "</div>";
            break;
          case '4':
            $_SESSION['reportid']=$_REQUEST['reportid'];
            echo "<div class='row box'>";
            echo "<p class='text'>Students present/absent on a particular date</p>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<form class='form' action='report_calc.php' method='POST' target='Iframe2'>";
            echo "<div class='form-group'>";
            echo "<label>Enter Date :</label>";
            echo "<input  id='datepicker' name='date' type='text' placeholder='yyyy/mm/dd' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'yyyy/mm/dd';}' required='''>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label>Present :</label>";
            echo "<input type='radio' class='form-control' name='present' value='P'>";
            echo "</div>";
             echo "<div class='form-group'>";
             echo "<label>Absent :</label>";
            echo "<input type='radio' class='form-control' name='present' value='A'>";
            echo "</div>";
            echo "<button type='submit' value='4' name='submit' class='btn btn-default'>Search</button>";
            echo "</form>";
            echo "</div>";
            break;
          case '5':
            $_SESSION['reportid']=$_REQUEST['reportid'];
            echo "<div class='row box'>";
            echo "<p class='text'>Attendance of a particular student</p>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<form class='form' action='report_calc.php' method='POST' target='Iframe2'>";
            echo "<div class='form-group'>";
            echo "<label>Enter Student I.D. :</label>";
            echo "<input type='text' class='form-control' name='studentid'>";
            echo "</div>";
            echo "<button type='submit' value='5' name='submit' class='btn btn-default'>Search</button>";
            echo "</form>";
            echo "</div>";
            break;
          case '6':
            $_SESSION['reportid']=$_REQUEST['reportid'];
            echo "<div class='row box'>";
            echo "<p class='text'>Average attendance of the whole class</p>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<form class='form' action='report_calc.php' method='POST' target='Iframe2'>";
            echo "<div class='form-group'>";
            echo "<button type='submit' value='6' name='submit' class='btn btn-default'>Search</button>";
            echo "</form>";
            echo "</div>";
            break;
          case '7':
            $_SESSION['reportid']=$_REQUEST['reportid'];
            echo "<div class='row box'>";
            echo "<p class='text'>Students absent for x consecutive classes</p>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<form class='form' action='report_calc.php' method='POST' target='Iframe2'>";
            echo "<div class='form-group'>";
            echo "<label>Enter the number of consecutive days :</label>";
            echo "<input type='number' class='form-control' name='x'>";
            echo "</div>";
            echo "<button type='submit' value='7' name='submit' class='btn btn-default'>Search</button>";
            echo "</form>";
            echo "</div>";
            break;
          case '8':
            $_SESSION['reportid']=$_REQUEST['reportid'];
            echo "<div class='row box'>";
            echo "<p class='text'>Percentage of attendance of all students till a particular date.</p>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<form class='form' action='report_calc.php' method='POST' target='Iframe2'>";
            echo "<div class='form-group'>";
            echo "<label>Enter Date :</label>";
            echo "<input  id='datepicker' name='date' type='text' placeholder='yyyy/mm/dd' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'yyyy/mm/dd';}' required='''>";
            echo "</div>";
            echo "<button type='submit' value='8' name='submit' class='btn btn-default'>Search</button>";
            echo "</form>";
            echo "</div>";
            break;
          
          default:
            # code...
            break;
        }
    ?>
    <div class="row">
      <iframe src="#" width="100%" height="600px" target='_top' name="Iframe2" frameborder="0">
      </iframe>  
    </div>
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

