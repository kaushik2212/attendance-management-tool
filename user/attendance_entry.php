<?php 
include "connect.php";
session_start();
if(isset($_REQUEST['submit']))
{
	$_SESSION['attendance_success']="";
	$flag=0;$entry_count=0;
	$tid=$_SESSION['teacher_log_id'];
	$cid=$_REQUEST['submit'];
	$date=$_REQUEST['date'];
	$present=$_POST['present'];
	$count=$_SESSION["count"];
	$cid=$_SESSION["course_id"];
	$sql="SELECT sid,sname from student where semester=(SELECT semester FROM course WHERE cid ='$cid') AND branch=(SELECT branch FROM course WHERE cid ='$cid')";
	$result1=$conn->query($sql);
	if($result1->num_rows > 0)
	{
		for($i=0;$i<$count-1;$i++)
		{
			while ($row=$result1->fetch_assoc())
			{
				if($row['sid']==$present[$i])
				{
					$id=$row['sid'];
					echo "Present";
					$sql1="INSERT INTO attendance_table VALUES ('$date','$tid','$cid','$id','P')";
					if($conn->query($sql1))
					{
						$entry_count++;
						break;
					}
				}
				else
				{
					$id=$row['sid'];
					echo "Absent";
					$sql1="INSERT INTO attendance_table VALUES ('$date','$tid','$cid','$id','A')";
						if($conn->query($sql1))
						{
							$entry_count++;
						}
				}
			}
		}
		if($count-1==$entry_count)
		{
			$_SESSION['attendance_success']=1;
			header("location:attendance_insert.php");
		}
		else
		{
			$_SESSION['attendance_success']=0;-
			header("location:attendance_insert.php");
		}
	}
}
$conn->close();
?>