<?php 
session_start();
include '../connect.php';
$_SESSION['course_update_success']="";
if(isset($_REQUEST['submit']))
{
	$cid=$_POST['cid'];
	$cname=$_POST['cname'];
	$branch=$_POST['branch'];
	$semester=$_POST['semester'];
	$sql="INSERT INTO course (cid, cname, branch, semester) VALUES ('$cid','$cname','$branch','$semester')";
	if($conn->query($sql))
	{
		$_SESSION['course_update_success']=1;
		header("location:course_update.php");
	}
	else
	{
		$_SESSION['course_update_success']=0;
		header("location:course_update.php");
	}
}
?>