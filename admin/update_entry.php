<?php
ob_start();
session_start();
include "../connect.php";
if(isset($_REQUEST['submit']))
{
	$branch=$_POST['branch'];
	$psem=$_POST['psemester'];
	$usem=$_POST['usemester'];
	$upsql="UPDATE student SET semester='$usem' WHERE semester='$psem' AND branch='$branch'";
	if($conn->query($upsql))
	{
		$_SESSION['update_success']=1;
		header("location:update_student.php");
	}
	else
	{
		$_SESSION['update_success']=0;
		header("location:update_student.php");
	}

}
?>