<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="row"></div>
	<div class="row">
		<div class="col-sm-5"></div>
		<div class="col-sm-2" style="margin-top: 8%;">
			<form method="POST" action="admin_check.php" enctype="multipart/form-data">
				<h3 style="text-align: center;">ADMIN LOGIN</h3>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-user"></span>Username</label>
					<input type="text" name="admin_user" class="form-control" placeholder="Enter Username" autocomplete="off">
				</div>
				<div class="form-group">
					<label><span class="glyphicon glyphicon-eye-open"></span>Password</label>
					<input type="password" name="admin_password" class="form-control" placeholder="Enter Password" autocomplete="off">
				</div><br>
				<input type="submit" name="submit" value="Login" class="btn btn-success btn-block">
				<p style="color: red;">
					<?php
						if(!empty($_SESSION['admin_login_error']))
						{
							echo $_SESSION['admin_login_error'];
							$_SESSION["admin_login_error"]="";
						}
					?>
				</p>
			</form>
		</div>
	</div>
</body>
</html>