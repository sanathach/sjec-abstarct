<?php
include('inc/config.php');
$regpass = "admin";
$reg_pass = password_hash($regpass, PASSWORD_DEFAULT);
//  $sql =mysqli_query($conn,"UPDATE `admin` SET `password`='$reg_pass'");
?>