<?php
session_start();
unset($_SESSION['teacher_log_id']);
header("location:index.php");
?>