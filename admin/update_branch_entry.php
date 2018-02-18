<?php
ob_start();
session_start();
include "../connect.php";
if(isset($_REQUEST['submit']))
{
	$sid=$_POST['sid'];
	$pbranch=$_POST['pbranch'];
	$ubranch=$_POST['ubranch'];
	$upsql="UPDATE student SET branch='$ubranch' WHERE branch='$pbranch' AND sid='$sid'";
	if($conn->query($upsql))
	{
		$_SESSION['update_branch_success']=1;
		header("location:update_branch.php");
	}
	else
	{
		$_SESSION['update_branch_success']=0;
		header("location:update_branch.php");
	}

}
?>