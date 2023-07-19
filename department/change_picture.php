<?php
include('inc/session.php');
include('inc/connection.php');
    $usn = mysqli_real_escape_string($con, $_POST['usn']);
    $reason = mysqli_real_escape_string($con, $_POST['reason']);
    $sql = mysqli_query($con, "UPDATE approval set mentor_status='2',mentor_reason='$reason' WHERE usn='$usn'") or die(mysqli_error($con));
    if($sql){
        header("Location: approvals.php"); 
        exit;
    }
   ?>