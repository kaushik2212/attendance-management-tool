<?php
 session_start();
 include '../connect.php';
 $_SESSION['delete_allot_aubject']="";
 $sql="TRUNCATE TABLE alloted_subject";
 if($conn->query($sql))
 {
 	$_SESSION['delete_allot_aubject']=1;
 	header("location:admin_report.php");
 }
 else
 {
 	$_SESSION['delete_allot_aubject']=0;
 	header("location:admin_report.php");
 }
?>