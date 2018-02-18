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
            if(empty($_SESSION['update_branch_success']))
            {
              $_SESSION['update_branch_success']="";
            }
            else
            {
              if($_SESSION['update_branch_success']===1)
              {
                  echo "<p style='color:green;'>* Branch updated successfully</p>";
                  $_SESSION['update_branch_success']="";
              }
              if($_SESSION['update_branch_success']===0)
              {
                echo "<p style='color:red;'>* Error occured during update</p>";
                $_SESSION['update_branch_success']="";
              } 
              }           ?>
            <div class='row'>
            <form class='form ' action='update_branch_entry.php' method='POST'>
              <div class='form-group'>
                    <label>Student I.D.</label>
                    <input type='text' class='form-control' name='sid'>
                </div>
                <div class='form-group'>
                    <label>Select Present Branch</label>
                    <select class="form-control" name="pbranch" placeholder="Branch">
                      <option value="CSE" selected>CSE</option>
                      <option value="IT">IT</option>
                      <option value="ETC">ETC</option>
                      <option value="EEE">EEE</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label>Select Branch to Update</label>
                    <select class="form-control" name="ubranch" placeholder="Branch">
                      <option value="CSE" selected>CSE</option>
                      <option value="IT">IT</option>
                      <option value="ETC">ETC</option>
                      <option value="EEE">EEE</option>
                    </select>
                </div>
                <button type='submit' value='1' name='submit' class='btn btn-default'>Update</button>
            </form>
            </div>
    </div>
</body>
</html>

