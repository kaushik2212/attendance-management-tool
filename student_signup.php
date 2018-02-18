<?php
 include "connect.php";
if(isset($_REQUEST["submit"]))
{
 $sid=$_REQUEST["sid"];
 $password=base64_encode($_REQUEST["password"]);
 $cpassword=base64_encode($_REQUEST["cpassword"]);
 $sname=$_REQUEST["sname"];
 $emailid=$_REQUEST["emailid"];
 $contact=$_REQUEST["contactno"];
 $branch=$_REQUEST["branch"];
 $semester=$_REQUEST["semester"];
 $sql="INSERT INTO student(sid, sname, branch, semester, password) VALUES ('$sid', '$sname', '$branch', '$semester', '$password')";
 $sql1="INSERT INTO student_details(sid, phone_no, email) VALUES ('$sid', '$contact', '$emailid')";
 if(mysqli_query($conn,$sql))
 {
 	if(mysqli_query($conn,$sql1))
	 {
	 	echo "Update Successfull";
	 }
	 else
	 {
	 	echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
	 }
 }
 else
 {
 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
}
 mysqli_close($conn);
?>