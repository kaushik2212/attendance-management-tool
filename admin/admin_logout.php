<?php
	session_start();
	session_unset($_SESSION['admin_usr']);
	header("location:admin_home.php");
?>