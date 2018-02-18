<?php 
session_start();
$_SESSION["admin_login_error"]="";
$admin_usr=$_REQUEST["admin_user"];
$admin_pass=$_REQUEST["admin_password"];
if(strcmp($admin_usr, "admin")==0&&strcmp($admin_pass, "admin")==0)
{
	$_SESSION['admin_usr']=$admin_usr;
	header("location:admin_home.php");
}
else
{
	$_SESSION["admin_login_error"]="* Wrong username or password";
	header("location:index.php");
}
?>
