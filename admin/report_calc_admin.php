<?php
  session_start();
  include "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  
  </style>
</head>
<body>
  <div class="container-fluid">
    <?php
        switch ($_SESSION['reportid'])
        {
            /*Query for Report no 1*/
            case '1':
                echo "<table class='table'>
                        <thead>
                            <tr class='font' style='background-color: #5cb85c;'>
                                <th>Sl. no.</th>
                                <th>Student I.D.</th>
                                <th>Student name</th>
                                <th>Attendance(%)</th>
                            </tr>
                        </thead>
                        <tbody>";
                if(isset($_REQUEST['submit']))
                {
                    $a=explode(",",$_REQUEST['cid']);
                    $cid=$a[0];
                    $tid=$a[1];
                    $x=$_REQUEST['x'];
                    $sql="SELECT sid FROM student WHERE semester=(SELECT semester FROM course WHERE cid='$cid') AND branch=(SELECT branch FROM course WHERE cid='$cid')";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        $count=1;
                        $row=$result->fetch_assoc();
                        $id1=$row['sid'];
                        $sql1="SELECT sid,ROUND(((count(present)/(select count(a_date) from attendance_table where cid='$cid' and  tid='$tid' and sid='$id1'))*100),2) as percentage FROM `attendance_table` where (present='P' AND tid='$tid' AND cid='$cid') group by sid having percentage='$x'";
                        $result1=$conn->query($sql1);
                        if($result1->num_rows>0)
                        {
                            while ($row1=$result1->fetch_assoc()) 
                            {
                                $id2=$row1['sid'];
                                $sql2="SELECT sname FROM student WHERE sid='$id2'";
                                $result2=$conn->query($sql2);
                                if($result2->num_rows===1)
                                {    
                                    $row2=$result2->fetch_assoc();                               
                                    if($count%2==0)
                                      {
                                        echo "<tr class='success'>";
                                      }
                                      else
                                      {
                                        echo "<tr class='font'>";
                                      }
                                      echo "<td>";
                                      echo $count;
                                      echo "</td>";
                                      echo "<td>";
                                      echo $row1['sid'];
                                      echo "</td>";
                                      echo "<td>";
                                      echo $row2['sname'];
                                      echo "</td>";
                                      echo "<td >";
                                      echo $row1['percentage'];
                                      echo "</td>";
                                      echo "</tr>";
                                      $count++;                 
                                }    
                            }
                        }
                    }
                }
                echo "</tbody>";
                echo "</table>";
                break;
            
            /*Query for Report no 2*/
            case '2':
                echo "<table class='table'>
                        <thead>
                            <tr class='font' style='background-color: #5cb85c;'>
                                <th>Sl. no.</th>
                                <th>Student I.D.</th>
                                <th>Student name</th>
                                <th>Attendance(%)</th>
                            </tr>
                        </thead>
                        <tbody>";
                if(isset($_REQUEST['submit']))
                {
                    $a=explode(",",$_REQUEST['cid']);
                    $cid=$a[0];
                    $tid=$a[1];
                    $x=$_REQUEST['x'];
                    $sql="SELECT sid FROM student WHERE semester=(SELECT semester FROM course WHERE cid='$cid') AND branch=(SELECT branch FROM course WHERE cid='$cid')";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        $count=1;
                        $row=$result->fetch_assoc();
                        $id1=$row['sid'];
                        $sql1="SELECT sid,ROUND(((count(present)/(select count(a_date) from attendance_table where cid='$cid' and  tid='$tid' and sid='$id1'))*100),2) as percentage FROM `attendance_table` where (present='P' AND tid='$tid' AND cid='$cid') group by sid having percentage>'$x'";
                        $result1=$conn->query($sql1);
                        if($result1->num_rows>0)
                        {
                            while ($row1=$result1->fetch_assoc()) 
                            {
                                $id2=$row1['sid'];
                                $sql2="SELECT sname FROM student WHERE sid='$id2'";
                                $result2=$conn->query($sql2);
                                if($result2->num_rows===1)
                                {    
                                    $row2=$result2->fetch_assoc();                               
                                    if($count%2==0)
                                      {
                                        echo "<tr class='success'>";
                                      }
                                      else
                                      {
                                        echo "<tr class='font'>";
                                      }
                                      echo "<td>";
                                      echo $count;
                                      echo "</td>";
                                      echo "<td>";
                                      echo $row1['sid'];
                                      echo "</td>";
                                      echo "<td>";
                                      echo $row2['sname'];
                                      echo "</td>";
                                      echo "<td >";
                                      echo $row1['percentage'];
                                      echo "</td>";
                                      echo "</tr>";
                                      $count++;                 
                                }    
                            }
                        }
                    }
                }
                echo "</tbody>";
                echo "</table>";
                break;

            /*Query for Report no 3*/
            case '3':
                echo "<table class='table'>
                        <thead>
                            <tr class='font' style='background-color: #5cb85c;'>
                                <th>Sl. no.</th>
                                <th>Student I.D.</th>
                                <th>Student name</th>
                                <th>Attendance(%)</th>
                            </tr>
                        </thead>
                        <tbody>";
                if(isset($_REQUEST['submit']))
                {
                    $a=explode(",",$_REQUEST['cid']);
                    $cid=$a[0];
                    $tid=$a[1];
                    $x=$_REQUEST['x'];
                    $sql="SELECT sid FROM student WHERE semester=(SELECT semester FROM course WHERE cid='$cid') AND branch=(SELECT branch FROM course WHERE cid='$cid')";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        $count=1;
                        $row=$result->fetch_assoc();
                        $id1=$row['sid'];
                        $sql1="SELECT sid,ROUND(((count(present)/(select count(a_date) from attendance_table where cid='$cid' and  tid='$tid' and sid='$id1'))*100),2) as percentage FROM `attendance_table` where (present='P' AND tid='$tid' AND cid='$cid') group by sid having percentage<'$x'";
                        $result1=$conn->query($sql1);
                        if($result1->num_rows>0)
                        {
                            while ($row1=$result1->fetch_assoc()) 
                            {
                                $id2=$row1['sid'];
                                $sql2="SELECT sname FROM student WHERE sid='$id2'";
                                $result2=$conn->query($sql2);
                                if($result2->num_rows===1)
                                {    
                                    $row2=$result2->fetch_assoc();                               
                                    if($count%2==0)
                                      {
                                        echo "<tr class='success'>";
                                      }
                                      else
                                      {
                                        echo "<tr class='font'>";
                                      }
                                      echo "<td>";
                                      echo $count;
                                      echo "</td>";
                                      echo "<td>";
                                      echo $row1['sid'];
                                      echo "</td>";
                                      echo "<td>";
                                      echo $row2['sname'];
                                      echo "</td>";
                                      echo "<td >";
                                      echo $row1['percentage'];
                                      echo "</td>";
                                      echo "</tr>";
                                      $count++;                 
                                }    
                            }
                        }
                    }
                }
                echo "</tbody>";
                echo "</table>";
                break;
            
            /*Query for Report no 4*/
            case '4':
                echo "<table class='table'>
                        <thead>
                            <tr class='font' style='background-color: #5cb85c;'>
                                <th>Sl. no.</th>
                                <th>Student I.D.</th>
                                <th>Student name</th>
                                <th>Present/Absent</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>";
                if(isset($_REQUEST['submit']))
                {
                    $a=explode(",",$_REQUEST['cid']);
                    $cid=$a[0];
                    $tid=$a[1];
                    $date=$_REQUEST['date'];
                    $p=$_REQUEST['present'];
                    $sql="SELECT sid,present FROM `attendance_table` WHERE a_date='$date' and present='$p' AND cid ='$cid' and tid='$tid'";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        $count=1;
                            while ($row=$result->fetch_assoc()) 
                            {
                                $id2=$row['sid'];
                                $sql2="SELECT sname FROM student WHERE sid='$id2'";
                                $result2=$conn->query($sql2);
                                if($result2->num_rows===1)
                                {    
                                    $row2=$result2->fetch_assoc();                               
                                    if($count%2==0)
                                      {
                                        echo "<tr class='success'>";
                                      }
                                      else
                                      {
                                        echo "<tr class='font'>";
                                      }
                                      echo "<td>";
                                      echo $count;
                                      echo "</td>";
                                      echo "<td>";
                                      echo $row['sid'];
                                      echo "</td>";
                                      echo "<td>";
                                      echo $row2['sname'];
                                      echo "</td>";
                                      echo "<td>";
                                      if($row['present']=='P')
                                      {
                                        echo "Present";
                                      }
                                      else if($row['present']=='A')
                                      {
                                        echo "Absent";
                                      }
                                      echo "</td>";
                                      echo "<td >";
                                      echo $date;
                                      echo "</td>";
                                      echo "</tr>";
                                      $count++;                 
                                }    
                            }
                    }
                }
                echo "</tbody>";
                echo "</table>";
                break;
            
            /*Query for Report no 5*/
            case '5':
                echo "<table class='table'>
                        <thead>
                            <tr class='font' style='background-color: #5cb85c;'>
                                <th>Sl. no.</th>
                                <th>Date</th>
                                <th> Present/Absent</th>
                            </tr>
                        </thead>
                        <tbody>";
                if(isset($_REQUEST['submit']))
                {
                    $a=explode(",",$_REQUEST['cid']);
                    $cid=$a[0];
                    $tid=$a[1];
                    $sid=$_REQUEST['studentid'];
                    $sql="SELECT present,a_date FROM `attendance_table` WHERE cid='$cid' and sid='$sid' and tid='$tid'";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        $count=1;
                            while ($row=$result->fetch_assoc()) 
                            {                               
                                    if($count%2==0)
                                      {
                                        echo "<tr class='success'>";
                                      }
                                      else
                                      {
                                        echo "<tr class='font'>";
                                      }
                                      echo "<td>";
                                      echo $count;
                                      echo "</td>";
                                      echo "<td >";
                                      echo $row['a_date'];
                                      echo "</td>";
                                      echo "<td>";
                                      echo $row['present'];
                                      echo "</td>";
                                      echo "</tr>";
                                      $count++;                        
                            }
                    }
                }
                echo "</tbody>";
                echo "</table>";   
                break;         
                
            /*Query for Report no 6*/
            case '6':
                echo "<table class='table'>
                        <thead>
                            <tr class='font' style='background-color: #5cb85c;'>
                                <th>Sl. no.</th>
                                <th>Course name</th>
                                <th> Present/Absent</th>
                            </tr>
                        </thead>
                        <tbody>";
                if(isset($_REQUEST['submit']))
                {
                    $a=explode(",",$_REQUEST['cid']);
                    $cid=$a[0];
                    $tid=$a[1];
                    $sql="SELECT sid FROM student WHERE semester=(SELECT semester FROM course WHERE cid='$cid') AND branch=(SELECT branch FROM course WHERE cid='$cid')";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                        $id=$row['sid'];
                        $sql1="SELECT avg(percentage) from (SELECT sid,(count('present')/(select count('a_date') from attendance_table where cid='$cid' and  tid='$tid' and sid='$id'))*100 as percentage FROM `attendance_table` where (present='P' AND tid='$tid' AND cid='$cid') group by sid) as percentage";
                        $result1=$conn->query($sql1);
                        if($result1->num_rows>0)
                        {
                            $count=1;
                                while ($row1=$result1->fetch_assoc()) 
                                {                               
                                        if($count%2==0)
                                          {
                                            echo "<tr class='success'>";
                                          }
                                          else
                                          {
                                            echo "<tr class='font'>";
                                          }
                                          $sql2="SELECT cname from course WHERE cid='$cid'";
                                          $result2=$conn->query($sql2);
                                          if($result2->num_rows==1)
                                          {
                                              $row2=$result2->fetch_assoc();
                                              echo "<td>";
                                              echo $count;
                                              echo "</td>";
                                              echo "<td >";
                                              echo $row2['cname'];
                                              echo "</td>";
                                              echo "<td>";
                                              echo round($row1['avg(percentage)'],2)." %";
                                              echo "</td>";
                                              echo "</tr>";
                                              $count++;
                                          }                 
                                        
                                }
                        }
                    }
                }
                echo "</tbody>";
                echo "</table>";      
                break;
            
            /*Query for Report no 7*/
            case '7':
                echo "<table class='table'>
                        <thead>
                            <tr class='font' style='background-color: #5cb85c;'>
                                <th>Sl. no.</th>
                                <th>Student I.D. </th>
                                <th>Student Name</th>
                            </tr>
                        </thead>
                        <tbody>";
                        if(isset($_REQUEST['submit']))
                        {
                            $cnt=0;
                            $a=explode(",",$_REQUEST['cid']);
                            $cid=$a[0];
                            $tid=$a[1];
                            $x=$_REQUEST['x'];
                            $sql="SELECT sid FROM student WHERE semester=(SELECT semester FROM course WHERE cid='$cid') AND branch=(SELECT branch FROM course WHERE cid='$cid')";
                            $result=$conn->query($sql);
                            if($result->num_rows>0)
                            {
                                $count=1;
                                while($row=$result->fetch_assoc())
                                {
                                   $cnt=0;
                                    $id=$row['sid'];
                                    $sql1="SELECT present FROM attendance_table WHERE sid='$id' AND tid='$tid' AND cid='$cid'";
                                    $result1=$conn->query($sql1);
                                    if($result1->num_rows>0)
                                    {
                                        while($row1=$result1->fetch_assoc())
                                        {

                                            if($row1['present']=='A')
                                            {
                                                $cnt++;
                                            }
                                            else if($row1['present']=='P')
                                            {
                                                $cnt=0;
                                            }
                                            
                                            if($cnt==$x)
                                            {
                                                if($count%2==0)
                                                  {
                                                    echo "<tr class='success'>";
                                                  }
                                                  else
                                                  {
                                                    echo "<tr class='font'>";
                                                  }
                                                  $sql2="SELECT sname from student WHERE sid='$id'";
                                                  $result2=$conn->query($sql2);
                                                  if($result2->num_rows==1)
                                                  {
                                                      $row2=$result2->fetch_assoc();
                                                      echo "<td>";
                                                      echo $count;
                                                      echo "</td>";
                                                      echo "<td >";
                                                      echo $id;
                                                      echo "</td>";
                                                      echo "<td>";
                                                      echo $row2['sname'];
                                                      echo "</td>";
                                                      echo "</tr>";
                                                      $count++;
                                                  }  
                                                  $cnt=0;
                                                  break;            
                                            }

                                        }
                                    }
                                }
                            }
                        }
                echo "</tbody>";
                echo "</table>"; 

                break;
            case '8':
                echo "<table class='table'>
                        <thead>
                            <tr class='font' style='background-color: #5cb85c;'>
                                <th>Sl. no.</th>
                                <th>Student I.D.</th>
                                <th>Student Name</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>";
                if(isset($_REQUEST['submit']))
                {
                    $a=explode(",",$_REQUEST['cid']);
                    $cid=$a[0];
                    $tid=$a[1];
                    $date=$_REQUEST['date'];
                    $sql="SELECT sid FROM student WHERE semester=(SELECT semester FROM course WHERE cid='$cid') AND branch=(SELECT branch FROM course WHERE cid='$cid')";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                        $id=$row['sid'];
                        $sql1="SELECT sid,ROUND(((count(present)/(select count(a_date) from attendance_table where cid='$cid' and  tid='$tid' and sid='$id'and a_date<='$date'))*100),2) as percentage FROM `attendance_table` where (present='P' AND tid='$tid' AND cid='$cid'and a_date<='$date') group by sid";
                        $result1=$conn->query($sql1);
                        if($result1->num_rows>0)
                        {
                            $count=1;
                                while ($row1=$result1->fetch_assoc()) 
                                {                               
                                        if($count%2==0)
                                          {
                                            echo "<tr class='success'>";
                                          }
                                          else
                                          {
                                            echo "<tr class='font'>";
                                          }
                                          $id2=$row1['sid'];
                                          $sql2="SELECT sname from student WHERE sid='$id2'";
                                          $result2=$conn->query($sql2);
                                          if($result2->num_rows==1)
                                          {
                                              $row2=$result2->fetch_assoc();
                                              echo "<td>";
                                              echo $count;
                                              echo "</td>";
                                              echo "<td >";
                                              echo $row1['sid'];
                                              echo "</td>";
                                              echo "<td>";
                                              echo $row2['sname'];
                                              echo "</td>";
                                              echo "<td>";
                                              echo $row1['percentage']."%";
                                              echo "</td>";
                                              echo "</tr>";
                                              $count++;
                                          }                 
                                        
                                }
                        }
                    }
                }
                echo "</tbody>";
                echo "</table>";      
                break;
            default:
                # code...
            break;
        }
    ?>
    <div class="row">
      <iframe src="#" width="100%" height="600px" target='_top' name="Iframe2" frameborder="0">
      </iframe>  
    </div>
    </div>
</body>
</html>

