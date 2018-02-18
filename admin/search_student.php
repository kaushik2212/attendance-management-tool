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
            <div class='row'>
                <form class='form ' action='search_profile_admin.php' method='POST' target='Iframe2'>
                    <div class='form-group'>
                        <label>Enter Student I.D. :</label>
                        <input type='search' name='search' class='form-control'>
                    </div>
                    <button type='submit' value='1' name='submit' class='btn btn-default'>Search</button>
                </form>
            </div>
    <div class="row">
      <iframe src="#" width="100%" height="700px" target='_top' name="Iframe2" frameborder="0">
      </iframe>  
    </div>
    </div>
</body>
</html>

