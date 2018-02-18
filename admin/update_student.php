<?php
ob_start();
session_start();
include "../connect.php";
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
            
              if($_SESSION['update_success']===1)
              {
                  echo "<p style='color:green;'>* Semester updated successfully</p>";
                  $_SESSION['update_success']="";
              }
              if($_SESSION['update_success']===0)
              {
                echo "<p style='color:red;'>* Error occured during update</p>";
                $_SESSION['update_success']="";
              }            ?>
            <div class='row'>
            <form class='form ' action='update_entry.php' method='POST'>
                <div class='form-group'>
                    <label>Select Branch</label>
                    <select class="form-control" name="branch" placeholder="Branch">
                      <option value="CSE" selected>CSE</option>
                      <option value="IT">IT</option>
                      <option value="ETC">ETC</option>
                      <option value="EEE">EEE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Select present semester</label>
                    <select class="form-control" name="psemester" placeholder="Semester">
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
                <div class="form-group">
                    <label>Select semester to update</label>
                    <select class="form-control" name="usemester" placeholder="Semester">
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
                <button type='submit' value='1' name='submit' class='btn btn-default'>Update</button>
            </form>
            </div>
    </div>
</body>
</html>

