<?php
session_start();
unset($_SESSION['stu_log_id']);
header("location:index.php");
?>