<?php
	session_start();
	$_SESSION = array();
	// session_unset($_SESSION['logged_user']);
	session_destroy();
	header("location:index.php");
?>