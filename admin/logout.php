<?php
	session_start();
	$_SESSION = array();
	session_unset($_SESSION['logged_user']);
	header("location:index.php");
?>