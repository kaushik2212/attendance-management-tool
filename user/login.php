<?php
session_start();
include 'connect.php';
$req=$_REQUEST["submit"];
if(isset($req))
{
	echo"entered";	
	$username=$_REQUEST["usrname"];
	$pass=base64_encode($_REQUEST["psw"]);
	$login_type=$_REQUEST['log-type'];
	if(strcmp($login_type, "student")==0)
	{
		$sql="SELECT sid, password FROM student WHERE sid='$username' AND password='$pass'";
		$result=$conn->query($sql);
		if($result->num_rows==1)
		{
			echo $username;
			$_SESSION['stu_log_id'] = $username;
			echo $_SESSION["stu_log_id"];
				header("location:student_index.php");
		}
		else
		{			
			echo "Student login not Successfull";
		}
	}
	else if(strcmp($login_type, "teacher")==0)
	{
		$sql="SELECT tid, password FROM teacher WHERE tid='$username' AND password='$pass'";
		$result=$conn->query($sql);
		if($result->num_rows==1)
		{
			$_SESSION['teacher_log_id'] = $username;
			header("location:teacher_index.php");
		}
		else
		{
			echo "Teacher:Invalid username or password";
		}
	}
	$conn->close();
}
?>