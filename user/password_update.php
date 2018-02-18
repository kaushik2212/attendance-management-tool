<?php
        session_start();
        include "connect.php";
        /*$_SESSION['$usrErr']=$_SESSION['$passErr']=$_SESSION['$cpassErr']=$_SESSION['$emailErr']="";*/
        $x=0;
        $p=0;
        $usr=$pass=$email=$msg1="";
      /* if (isset($_REQUEST["submit"])) 
        {
          echo "entry";
          if (empty($_POST["usrname"]))
          {
            $_SESSION['$usrErr'] = "student id is required";
            $x=0;
          } 
          else 
          {
            $_SESSION['$usr'] = $_REQUEST["usrname"];
            $x=1;
          }
          /*password
          if (empty($_POST["pass"]))
          {
            $_SESSION['$passErr'] = "password is required";
            $x=0;
            $p=0;
          }
          else 
          {
            $x=1;
            $p=1;
          }
          /*confirm password
          if (empty($_POST["cpass"]))
          {
            $_SESSION['$cpassErr'] = "Password confirmation required";
            $x=0;
            $p=0;
          }
          else 
          {
            if($p==1)
            {
              if(strcmp($_REQUEST['pass'], $_REQUEST['cpass'])==0)
              {
                $pass=base64_encode($_REQUEST['pass']);
                $x=1;
              }
              else
              {
                $_SESSION['$cpassErr'] ="Password doesnt match"; 
                $x=0;
              }
            }
          }
          echo "$x";
          if($x==1)
          {
              $sql="UPDATE student SET password='$pass' WHERE sid='$usr'";
              $result=$conn->query($sql);
              if($result === TRUE)
              {
                $_SESSION['$msg1']=1;
                echo "Password changed";
              }
              else
              {
                $_SESSION['$msg1']=0;
                echo "Your are not yet registered";
              }
          }*/
          if(isset($_REQUEST['submit']))
          {
              $usr=$_REQUEST['usrname'];
              $pass=base64_encode($_REQUEST['pass']);
              $cpass=$_REQUEST['cpass'];
              $sql="UPDATE student SET password='$pass' WHERE sid='$usr'";
              $result=$conn->query($sql);
              if($result === TRUE)
              {
                echo "Password changed";
              }
              else
              {
                echo "Your are not yet registered";
              }
            }
    ?>