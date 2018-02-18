<?php
session_start();
include '../connect.php';
if(isset($_REQUEST['submit']))
{
	$cid=$_REQUEST['cid'];
	$tid=$_REQUEST['tid'];
	$sql="SELECT branch from course WHERE cid='$cid'";
	$result=$conn->query($sql);
	$row=mysqli_fetch_assoc($result);
	$branch=$row['branch'];
	$sql1="INSERT INTO alloted_subject (cid,tid,branch) VALUES ('$cid','$tid','$branch')";
	if($conn->query($sql1))
	{
		$_SESSION['subject_allot_success']=1;
		header("location:subject_allot.php");
	}
	else
	{
		$_SESSION['subject_allot_success']=0;
		header("location:subject_allot.php");
	}
}
?>