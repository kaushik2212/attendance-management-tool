<?php 
include "connect.php";
session_start();
if(isset($_REQUEST['submit']))
{
	echo "Entered";
	$tid=$_SESSION['teacher_log_id'];
	$date=$_SESSION['date'];
	unset($_SESSION['date']);
	$update=$_POST['update'];
	$count=count($update);
	$cid=$_SESSION["course_id"];
	echo $date;
	echo $count;
	if(!empty($update))
	{
		for ($i=0; $i < $count; $i++)
		{ 
			echo $i;
			$sql="SELECT present from attendance_table WHERE sid='$update[$i]' AND tid='$tid' AND a_date='$date' AND cid='$cid'";
			$result=$conn->query($sql);
			$row=$result->fetch_assoc();
			if($row['present']=='P')
			{
				$update_sql="UPDATE attendance_table SET present='A' WHERE sid='$update[$i]' AND tid='$tid' AND a_date='$date' AND cid='$cid'";
				if($conn->query($update_sql))
				{
					echo "Updated present";
					$_SESSION['update_success']=1;
				}
			}
			else if($row['present']=='A')
			{
				$update_sql="UPDATE attendance_table SET present='P' WHERE sid='$update[$i]' AND tid='$tid' AND a_date='$date' AND cid='$cid'";
				if($conn->query($update_sql))
				{
					echo "updated Absent";
					$_SESSION['update_success']=1;
				}
			}
		}
	}
}
$conn->close();
?>