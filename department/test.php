<?php
include('inc/config.php');
$pass = 'sanath';
$pass = password_hash($pass,PASSWORD_DEFAULT);
// $sql = mysqli_query($conn,"UPDATE department SET password='$pass'");
?>